<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
// use \Binafy\LaravelCart\Models\Cart;
use App\Models\Cart;
use Binafy\LaravelCart\Models\CartItem;
use Binafy\LaravelCart\LaravelCart;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        try {

            // Retrieve the product
            $product = Product::findOrFail($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found.'], 404);
            }    
            
            $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);
            
            $quantity = $request->quantity??1;
            $price = $product->getPrice();
            $subtotal = $price * $quantity;
            $options = $request->options??[];
            $options = json_encode($options);

            $cartItem = new CartItem([
                'itemable_id' => $product->id,
                'options'  => $options,
                'price'    => $price,
                'itemable' => $product,
                'itemable_type' => Product::class,
                'subtotal' => $subtotal,
                'quantity' => $quantity,
            ]);
            
            
            $cart->items()->save($cartItem);

            if($this->updateTotalPrice($cart)){
                return response()->json(['message' => 'Product added to cart.'], 200);
            }
            return response()->json(['error' => 'An error occurred.'], 500);
            
            
            
            // LaravelCart::storeItem([
            //     'price'    => $price,
            //     'itemable' => $product,
            //     'subtotal' => $subtotal,
            //     'quantity' => $quantity,
            //     'options'  => $options,
            // ], $request->user()->id);
            
        } catch (\Throwable $th) {
            // Log::error('Error adding to cart: ' . $th->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
    
    public function AddMiniCart(Request $request){
        try {

            // Retrieve the product
            $product = Product::find(5);

            if (!$product) {
                return response()->json(['error' => 'Product not found.'], 404);
            }            
            LaravelCart::storeItem([
                'itemable' => $product,
                'quantity' => 1,
                'options' =>  json_encode([
                    'size' => 'Medium',
                    'color' => 'Blue',
                    'pattern'=>'Striped'
                ]),
            ], $request->user()->id);
            
            return response()->json(['message' => 'Product added to cart.'], 200);

        } catch (\Throwable $th) {
            throw $th;
            // Log::error('Error adding to cart: ' . $th->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    public function applyCoupon(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);
        $couponCode = $request->coupon_code;

        //VARIVAVEIS
        $total = $cart->total;
        $discount = 0;


        if($cart->coupon){
            return back()->with('error', 'Carrinho já atrelado ao um Cupom');
        }


        if (!$couponCode ) {
            return back()->with('error', 'Nenhum código de cupom fornecido.');
        }

        $coupon = Coupon::where('code', $couponCode)->first();
        
        if (!$coupon || !$coupon->isValid()) {
            return back()->with('error', 'Cupom inválido ou expirado.');
        }
        

        if($this->processCoupon($cart, $coupon)){
            $coupon->increment('times_used');
            $cart->coupon()->associate($coupon);
            return back()->with('success', 'Cupom aplicado com sucesso.');
        }

        return back()->with('error', 'Falha ao aplicar o cupom.');
    }

    static  public function processCoupon($cart, $coupon)
    {
        $discount = 0;
        $total = $cart->total;


        if ($coupon && $coupon->isValid()) {
            $discount = $coupon->type == 'percentage' 
                ? ($total * ($coupon->discount / 100)) 
                : $coupon->discount;

            $discount =  max(0, $total - $discount); // Garante que o valor final não seja negativo
            $cart->total_discount = $discount == 0 ? null : $discount;
            $cart->coupon()->associate($coupon);
            $cart->save(); 
            return true;  
        }

        return false;
    }


    

    public function openCard(){

        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $cart->load('items');
        $this->updateTotalPrice($cart);
        $cart->refresh();
        return view('frontend.product.shop-cart', compact('cart'));
        
    }

    public function changeItems(Request $request){
        
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        $cart->load('items');
        $cartItem = $cart->items->find($request->id);

        if (!$cartItem) {
            // Handle the case where the cart item is not found
            return response()->json(['error' => 'Cart item not found.'], 404);
        }

        $quantity = $request->quantity??1;
        $price = $cartItem->itemable->getPrice();
        $subtotal = $price * $quantity;
        $cartItem->quantity = $quantity;
        $cartItem->subtotal = $subtotal;
        $cartItem->save();


        if( $this->updateTotalPrice($cart)){
            if($this->processCoupon($cart, $cart->coupon)){
                return response()->json(['success' => 'Registo alterado com sucesso!'], 200);
            }
            return response()->json(['success' => 'Registo alterado com sucesso!'], 200);
        }
        
        return response()->json(['error' => ' Falha ao actualizar o item'], 500);
    }
    
    public function deleteItem ($id){
        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

       //REMOVE BY PRODUCT
       //$cart->removeItem($product);

        $cartItem = $cart->items->find($id);

        if (!$cartItem) {
            // Handle the case where the cart item is not found
            return response()->json(['error' => 'Cart item not found.'], 404);
        }

        $cartItem->delete();

        if( $this->updateTotalPrice($cart)){
            return $this->openCard();
            // return response()->json(['success' => ' ITEM APAGADO COM SUCESSO'], 200);
        }

        throw new \Exception("Error deleting item from cart");
    }


    public function emptyCart($id){
        $user = auth()->user();
        $cart = Cart::findOrFail($id);
        $cart->emptyCart();
        // $cart->items()->delete();
        $cart->total = 0;
        $cart->total_discount = null;
        $cart->coupon_id = null;

        // $cart->coupon()->dissociate();
        $cart->save();
        return redirect()->back()->with('success', 'Carrinho esvaziado com sucesso!');
    }


    //UTILITIES
    static public function updateTotalPrice($cart)
    {
        if($cart){
            $cart->load('items');
            $cart->total = $cart->items->sum(function ($item) {
                return $item->quantity * $item->price;
            });
            $cart->save();
            return  true;
        }
        return false;
    }
}