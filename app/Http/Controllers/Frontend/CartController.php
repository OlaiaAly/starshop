<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Binafy\Cart\Facades\Cart;
use Illuminate\Spport\Facades\Session;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Verifica se o produto existe no banco de dados
    
        // Define o preço do produto, considerando o preço promocional se existir
if ( $product->discount_price == NULL) {
            // Adiciona o item ao carrinho usando o pacote binafy/laravel-cart
            $item = [
                'id' => $id,
                'name' => $product->product_name, // Ajuste conforme o campo correto do seu modelo
                'quantity' => $request->quantity,
                'price' => $product->$selling_price,
                'options' => [
                    'image' => $product->product_thambnail, // Ajuste conforme o campo correto do seu modelo
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ];
        
            // Chama o método de adicionar ao carrinho do pacote binafy/laravel-cart
            Cart::store($item);
        
            return response()->json(['success' => 'Adicionado com sucesso no Carrinho']);
    }   
    else{
        // Adiciona o item ao carrinho usando o pacote binafy/laravel-cart
        $item = [
            'id' => $id,
            'name' => $product->product_name, // Ajuste conforme o campo correto do seu modelo
            'quantity' => $request->quantity,
            'price' => $product->$discount_price,
            'options' => [
                'image' => $product->product_thambnail, // Ajuste conforme o campo correto do seu modelo
                'color' => $request->color,
                'size' => $request->size,
            ],
        ];
    
        // Chama o método de adicionar ao carrinho do pacote binafy/laravel-cart
        Cart::store($item);
    
        return response()->json(['success' => 'Adicionado com sucesso no Carrinho']);
    }
    }

   public function AddMiniCart(){

    }
}
