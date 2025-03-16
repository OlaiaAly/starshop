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
        $productId = $id;
        $color = $request->color;
        $size = $request->size;
        $quantity = $request->quantity;

        // Retrieve product information from your database (example)
        $product = \App\Models\Product::find($productId);

        // return response()->json([$product]);
        if ($product) {
            Cart::storeItem([
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'attributes' => [
                    'color' => $color,
                    'size' => $size,
                ],
            ]);
            
            return response()->json(['success' => 'Adicionado com sucesso no Carrinho']);
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


    public function openCard(Request $request){
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        if ($cart) {
            $cartItems = $cart->items;
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

    public function deleteItem (Request $id){
        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Assuming you have the cart item ID (e.g., from a form or request)
        // $cartItemId = $request->cart_item_id;
        
        //TO DELETE ALL CARD ITEMS
       // $cart->emptyCart();

       //REMOVE BY PRODUCT
       //$cart->removeItem($product);

        $cartItem = $cart->items->find(1);

        if (!$cartItem) {
            // Handle the case where the cart item is not found
            return response()->json(['error' => 'Cart item not found.'], 404);
        }

        $cartItem->delete();

        return response()->json(['success' => ' ITEM APAGADO COM SUCESSO'], 200);
    }
}