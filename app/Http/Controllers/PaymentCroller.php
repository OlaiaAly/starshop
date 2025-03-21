<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Http\Controllers\Frontend\CartController;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Validator;

class PaymentCroller extends Controller
{
    public function index()
    {
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
                    ? ($total * ($coupon->discount_amount / 100)) 
                    : $coupon->discount_amount;

                $coupon->increment('times_used');
            } else {
                return back()->with('error', 'Cupom inválido ou expirado.');
            }
        }

        $finalPrice = max(0, $total - $discount); // Garante que o valor final não seja negativo

        return view('frontend.product.checkout', compact('cart'));
    }


    public function applyCoupon(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);
        $couponCode = $request->input('coupon_code');

        if (!$couponCode) {
            return back()->with('error', 'Nenhum código de cupom fornecido.');
        }

        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon || !$coupon->isValid()) {
            return back()->with('error', 'Cupom inválido ou expirado.');
        }

        $cart->coupon()->associate($coupon);
        $cart->save();
        
        return back()->with('success', 'Cupom aplicado com sucesso.');
    }

    
    
    public function pay(Request $request){
        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        
        if(!CartController::updateTotalPrice($cart)){
            throw new \Exception('Erro ao atualizar o preço total do carrinho.');
        }

        $total = $cart->total;
        $discount = 0;
        $couponCode = $cart->coupon->code??null;

        if(!$this->create($request)){
            return redirect()->back()->with('error', 'Erro ao efectuar o pagamento.');
        }
        
        $cart->items->each(function ($item) {
            $item->product->decrement('product_qty', $item->quantity);
        });

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total,
            'coupon_code' => $couponCode,
            'discount_amount' => $discount,
            'payment_method' => $request->input('method'),
            'status' => 'pending',
        ]);

       $cart->emptyCart();

       return view('frontend.product.shop-invoice')->with('success', 'Pagamento efetuado com sucesso.');
    }
    

    public function create(Request $request): bool{
        $user = $request->user();

        if(!$this->validatePaymentMethod($request)){
            return false;
        }

        
        $payment = new MpesaService();
        $parameters = [
            'amount' => 200,
            'telephone' => 845180066,
        ];

        $response = $payment->C2B($parameters);
        if($response->output_error??null){
            return false;
        }

        if($response->output_ResponseCode == "INS-0"){
            $user->payments()->create([
                'sum' => $parameters['amount'],
                'reference' => $response->output_ThirdPartyReference,
                'method' => PaymentMethod::M_PESA,
                'account_number' => $parameters['telephone'],
            ]);
            return true;
        }

        return false;
    }

    private function  validatePaymentMethod(Request $request){
         // Validação direta no Controller
         $validator = Validator::make($request->all(), [
            'method' => ['required', new Enum(PaymentMethod::class)], // Valida se é um método válido
            'amount' => ['required', 'numeric', 'min:1'],
        ]);

        // Se falhar, retorna erro
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
     
        }

        return true;
    }
}
