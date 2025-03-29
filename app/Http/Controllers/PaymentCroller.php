<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Http\Controllers\Frontend\CartController;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Services\MpesaService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Validator;

class PaymentCroller extends Controller
{
    public function index()
    {


        $methods = PaymentMethod::labels();

        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        $total = $cart->total;
        $discount = 0;
        $couponCode = $cart->coupon->code??null;

        if(!CartController::updateTotalPrice($cart)){
            return redirect()->back()->with('error', 'Carrinho vazio.');
        }

        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();

            if ($coupon && $coupon->isValid()) {
                $discount = $coupon->type == 'percentage' 
                    ? ($total * ($coupon->discount / 100)) 
                    : $coupon->discount;

                $coupon->increment('times_used');
            } else {
                return back()->with('error', 'Cupom inválido ou expirado.');
            }
        }

        $finalPrice = max(0, $total - $discount); // Garante que o valor final não seja negativo

        return view('frontend.product.shop-checkout', compact('cart', 'methods'));
    }


   

    
    
    public function pay(Request $request){


        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        
        if(!CartController::updateTotalPrice($cart) && !CartController::processCoupon($cart, $cart->coupon)){
            return redirect()->back()->with('error', 'Erro ao actualizar o custo da vendas.');
        }
      
    
        $parameters = $request->all();
        $parameters['amount'] = $cart->total_discount?? $cart->total;

        $paymentId = $this->create($parameters); // Store the payment ID after calling create()


        if( !$paymentId ){
            return redirect()->back()->with('error', 'Erro ao efectuar o pagamento.');
        }
        
        //REDDUZIR O STOCK
        // $cart->items->each(function ($item) {
        //     $item->product->decrement('product_qty', $item->quantity);
        // });

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $cart->total,
            'coupon_code' => $cart->coupon->code??null,
            'discount_amount' => $cart->total_discount,
            'payment_id' => $paymentId,
            'status' => 'pending',
            'order_number' => 'ORD-'.uniqid(),
        ]);

        //TRANSFERINDO OS ITEMS DO CARRINHO PARA PEDIDO
        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->itemable->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'subtotal' => $item->subtotal,
                'options' => $item->options??null,
            ]);
        }

        //LIMPANDO O CARRINHO	
        $cart->emptyCart(); 
        $cart->total = 0;
        $cart->total_discount = null; // Garante que está passando NULL
        $cart->coupon_id = null;
        $cart->save();
        return redirect()->route('orders.pdf', ['id' => $order->id])->with('success', 'Pagamento efetuado com sucesso.');
    }
    

    public function create($parameters): bool{

        $user = auth()->user();
        $payment = new MpesaService();
    

        $response = $payment->C2B([ 
            'amount' => $parameters['amount'],
            'telephone' => $parameters['telephone'],
        ]);

        if($response->output_error??null){
            return false;
        }

        if($response->output_ResponseCode == "INS-0"){
            $user->payments()->create([
                'sum' => $parameters['amount'],
                'reference' => $response->output_ThirdPartyReference,
                'method' => PaymentMethod::M_PESA,
                'account_number' => $parameters['telephone'],
                'name' => $parameters['name'],
                'email' => $parameters['email'],
                'address' => $parameters['address'],
                "province" => $parameters['province'],
                "aditional_info" => $parameters['aditional_info'],
                'phone' => $parameters['phone']
            ]);
            return true;
        }

        return false;
    }
}
