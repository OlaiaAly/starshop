<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use \Binafy\LaravelCart\Models\Cart;
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


    public function openCard(){

        // return redirect()->back()->with('success', 'Venda realizada com sucesso!');

        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $cart->load('items');
        return view('frontend.product.shop-cart', compact('cart'));

        if ($cart) {
            foreach ($cartItems as $cartItem) {
                // Access item details
                $itemable = $cartItem->itemable; // The related model (e.g., Product)
                $quantity = $cartItem->quantity;
                
                echo "Product: " . $itemable->product_name . ", Quantity: " . $quantity . "<br>";

                // Decode the JSON options
                $options = json_decode($cartItem->options, true);
                
                // Display the options
                if ($options) {
                    echo ", Options: ";
                    foreach ($options as $key => $value) {
                        echo "<p>".$key . ": " . $value . ", </p>";
                    }
                }
                echo "<br>";
                
            }
        } else {
            echo "Cart not found.";
        }
        exit;
    }

    public function changeItems(Request $request){
        
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        $cart->load('items');
        $cart->total = $cart->items->sum(function ($item) {
            return $item->quantity * $item->price; // Adjust based on your structure
        });
        $cart->save();
    
        return redirect()->back()->with('success', 'Venda realizada com sucesso!');
        

        //OLD
        // $cartItem = $cart->items->find($carItemId);
        $cartItem = $cart->items->find(1);

        if (!$cartItem) {
            // Handle the case where the cart item is not found
            return response()->json(['error' => 'Cart item not found.'], 404);
        }
        $cartItem->quantity = 5;
        // $cartItem->options = json_encode($options); // Re-encode the options
        $cartItem->options = json_encode(
            [
                "AGUA" => "VUMABA",
                "MONTE" => "CHANDE",
                "TERRA" => "Mar"
            ]); // Re-encode the options
        $cartItem->save();
        return response()->json(['success' => 'Registo alterado com sucesso!'], 200);
    }

    public function deleteItem ($id){
        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Assuming you have the cart item ID (e.g., from a form or request)
        // $cartItemId = $request->cart_item_id;
        
        //TO DELETE ALL CARD ITEMS
       // $cart->emptyCart();

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