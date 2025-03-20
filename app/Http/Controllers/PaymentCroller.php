<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Http\Controllers\Frontend\CartController;
use App\Models\Cart;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Validator;

class PaymentCroller extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        if(CartController::updateTotalPrice($cart)){
            return view('frontend.product.checkout', compact('cart'));
        }
        else{
            return redirect()->back()->with('error', 'Carrinho vazio.');
        }
    }


     public function create(Request $request): bool{
        $user = $request->user();

        dd($request->all());

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
            $user->payment()->create([
                'sum' => $request->amount,
                'reference' =>  $response->output_ThirdPartyReference,
                'method_id' => $request->method_id,
                'account_number' => $request->account_number,
            ]);

            return true;
        }

        return false;
    }


    public function pay(Request $request){
        if($this->create($request)){
            return redirect()->route('home')->with('success', 'Pagamento efectuado com sucesso.');
        }
        
        return redirect()->back()->with('error', 'Erro ao efectuar o pagamento.');
    
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
