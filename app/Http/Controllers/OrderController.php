<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\CartController;
use App\Models\Cart;
use App\Models\Sale;
use Illuminate\Http\Request;
// use \Binafy\LaravelCart\Models\Cart;

use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    
    
    
    static public function store(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        // $cart->items->each(function ($item) {
        //     $item->product->decrement('product_qty', $item->quantity);
        // });


        if(!CartController::updateTotalPrice($cart)){
            throw new \Exception('Erro ao atualizar o preço total do carrinho.');
        }


        
           
        $total = $cart->total;
        $discount = 0;
        $couponCode = $cart->coupon->code??null;

        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();

            if ($coupon && $coupon->isValid()) {
                $discount = $coupon->type == 'percentage' 
                    ? ($total * ($coupon->discount_amount / 100)) 
                    : $coupon->discount_amount;

                $coupon->increment('times_used');
            } else {
                return back()->with('error', 'Cupom inválido ou expirado.');
            }
        }

        $finalPrice = max(0, $total - $discount); // Garante que o valor final não seja negativo

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'coupon_code' => $couponCode,
            'discount_amount' => $discount,
            'payment_method' => $request->input('payment_method'),
            'status' => 'pending',
        ]);

        // Limpar o carrinho
        // $cart->emptyCart();

        return redirect()->route('sales.show', $order->id)->with('success', 'Venda realizada com sucesso!');
    }


    // public function store(Request $request)
    // {
    //     $cart = session('cart', []); // Pega os itens do carrinho da sessão
    //     $total = array_sum(array_column($cart, 'price')); // Soma os preços
    //     $discount = 0;
    //     $couponCode = $request->input('coupon_code');

    //     if ($couponCode) {
    //         $coupon = Coupon::where('code', $couponCode)->first();

    //         if ($coupon && $coupon->isValid()) {
    //             $discount = $coupon->type == 'percentage' 
    //                 ? ($total * ($coupon->discount_amount / 100)) 
    //                 : $coupon->discount_amount;

    //             $coupon->increment('times_used');
    //             $coupon->increment('times_used', 2); //Adiciona 2


    //             // $coupon->decrement('usage_limit'); // Subtrai 1
    //             // $coupon->decrement('usage_limit', 3); // Subtrai 3

    //         } else {
    //             return back()->with('error', 'Cupom inválido ou expirado.');
    //         }
    //     }

    //     $finalPrice = max(0, $total - $discount); // Garante que o valor final não seja negativo

    //     $sale = Sale::create([
    //         'user_id' => Auth::id(),
    //         'total_price' => $total,
    //         'coupon_code' => $couponCode,
    //         'discount_amount' => $discount,
    //         'payment_method' => $request->input('payment_method'),
    //         'status' => 'pending',
    //     ]);

    //     // Limpar o carrinho
    //     session()->forget('cart');

    //     return redirect()->route('sales.show', $sale->id)->with('success', 'Venda realizada com sucesso!');
    // }
}
