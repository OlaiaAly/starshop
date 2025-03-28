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
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class OrderController extends Controller
{
    
    
    
    public function index()
    {
        
        $orders = auth()->user()->orders;
        return view('frontend\orders\orders-list', compact('orders'));
    }
    
    public function openOrderPDF($id)
    {   
        $user = auth()->user();
        $order = Order::where('id', $id)
        ->where('user_id', $user->id)
        ->firstOrFail();

        $order->load('items');
        
        
        return view ('frontend.product.shop-invoice', compact('order'));


        // $pdf = PDF::loadView('frontend.product.shop-invoice', compact('order'))
        
        // $pdf = Pdf::loadView('frontend.orders.shop-invoice-doc', compact('order'))->setPaper('a4', 'landscape')->setOptions([
        //     'isHtml5ParserEnabled' => true,
        //     'isRemoteEnabled' => true
        // ]);
        // 


        // return $pdf->stream('order-'.$order->order_number.'.pdf');

        // return $pdf->download('order-'.$order->order_number.'.pdf');
    }
    
    // static public function store(Request $request)
    // {
    //     $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

    //     // $cart->items->each(function ($item) {
    //     //     $item->product->decrement('product_qty', $item->quantity);
    //     // });


    //     if(!CartController::updateTotalPrice($cart)){
    //         throw new \Exception('Erro ao atualizar o preço total do carrinho.');
    //     }

    //     if ($couponCode) {
    //         $coupon = Coupon::where('code', $couponCode)->first();

    //         if ($coupon && $coupon->isValid()) {
    //             $discount = $coupon->type == 'percentage' 
    //                 ? ($total * ($coupon->discount_amount / 100)) 
    //                 : $coupon->discount_amount;

    //             $coupon->increment('times_used');
    //         } else {
    //             return back()->with('error', 'Cupom inválido ou expirado.');
    //         }
    //     }


    //     $order = Order::create([
    //         'user_id' => Auth::id(),
    //         'order_number' => 'ORD-'.uniqid(),
    //         'total_price' => $total,
    //         'coupon_code' => $couponCode,
    //         'discount_amount' => $discount,
    //         'payment_id' => $paymentId,
    //         'status' => 'pending',
    //     ]);


    //     foreach ($cart->items as $item) {
    //         $order->items()->create([
    //             'product_id' => $item->itemable->id,
    //             'quantity' => $item->quantity,
    //             'price' => $item->price,
    //             'subtotal' => $item->subtotal,
    //             'options' => $item->options??null,
    //         ]);
    //     }
    //     // $cart->emptyCart();

    //     return redirect()->route('sales.show', $order->id)->with('success', 'Venda realizada com sucesso!');
    // }






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
