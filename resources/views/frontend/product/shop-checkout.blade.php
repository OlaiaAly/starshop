﻿@extends('frontend.master_dashboard')
@section('main')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h3 class="heading-2 mb-10">Checkout</h3>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are products in your cart</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
    
    <div class="row">
        <h4 class="mb-30">Billing Details</h4>
        <form action="{{ route('pay') }}" method="post">
            @csrf

            <div class="row">
                <div class="form-group col-lg-6">
                    <input t ype="text" id="name" name="name" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group col-lg-6">
                    <input type="email" id="email"  name="email" placeholder="Digite seu email" required>
                </div>
            </div>
                           


                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select     name="province" class="form-control select-active" required>
                                        <option value="">Província...</option>
                                            <option value="Maputo Cidade">Maputo Cidade</option>
                                            <option value="Maputo Província">Maputo Província</option>
                                            <option value="Gaza">Gaza</option>
                                            <option value="Inhambane">Inhambane</option>
                                            <option value="Manica">Manica</option>
                                            <option value="Sofala">Sofala</option>
                                            <option value="Tete">Tete</option>
                                            <option value="Zambézia">Zambézia</option>
                                            <option value="Nampula">Nampula</option>
                                            <option value="Cabo Delgado">Cabo Delgado</option>
                                            <option value="Niassa">Niassa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                <input type="tel" pattern="8[2-7]\d{7}" id="phone" name="phone" 
                                    placeholder="Digite seu telefone" maxlength="9" required 
                                    title="8x xxx xxxx">
                                </div>
                            </div>

                             <!-- <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active">
                                            <option value="">Select an option...</option>
                                            <option value="AX">Aland Islands</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AD">Andorra</option>
                                             
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="city" placeholder="Post Code *">
                                </div>
                            </div> -->


                            <div class="row shipping_calculator">
                                <!-- <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active">
                                            <option value="">Select an option...</option>
                                            <option value="AX">Aland Islands</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AD">Andorra</option>
                                             
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="address" placeholder="Address *"> 
                                </div>
                            </div>


 

  
                            <div class="form-group mb-30">
                                <textarea name="aditional_info"  rows="5" placeholder="Additional information"></textarea>
                            </div>

 
 
                        </div>
                    </div>

                    
                    <div class="col-lg-5">
<div class="border p-40 cart-totals ml-30 mb-50">
    <div class="d-flex align-items-end justify-content-between mb-30">
        <h4>Your Order</h4>
        <h6 class="text-muted">Subtotal</h6>
    </div>
    <div class="divider-2 mb-30"></div>
    <div class="table-responsive order_table checkout">
        <table class="table no-border">
            <tbody>
                
                @foreach($cart->items as $item)
                <tr>
                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                    <td>
                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{$item->itemable->product_name}}</a></h6></span>
                        <div class="product-rate-cover">
                            
                            <!-- <strong>Color : </strong> -->
                            <!-- <strong>Size : </strong> -->

                            @php
                                $options = json_decode($item->options, true);
                            @endphp
                            @if($options)
                                @foreach ($options as $key => $value) 
                                    <small> {{ucwords($key)}}</small>: {{$value}}</br>
                                @endforeach
                            @endif
                        </div>
                    </td>
                    <td>
                        <h6 class="text-muted pl-20 pr-20">x {{$item->quantity}}</h6>
                    </td>
                    <td>
                        <h4 class="text-brand">
                            {{ number_format($item->subtotal, 2, '.', ' ') . ' MZN' }}
                        </h4>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        
        
                
                
        <table class="table no-border">
            <tbody>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Subtotal</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">
                            {{ number_format($cart->items->sum('subtotal'), 2, '.', ' ') . ' MZN' }}
                            </h4>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Coupn Name</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h6 class="text-brand text-end">
                                {{$cart->coupon->code??"Sem coupon"}}
                            </h6>
                        </td>
                    </tr>

                    @if($cart->coupon)
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Coupon Discount</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">
                                {{ $cart->coupon->type == 'percentage' ? $cart->coupon->discount.' %' : $cart->coupon->discount.' MZN' }}
                            </h4>
                        </td>
                    </tr>
                    @endif

                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Grand Total</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">       

                                {{ number_format($cart->total_discount??$cart->total, 2, '.', ' ') . ' MZN' }}
                            </h4>
                        </td>
                    </tr>
            </tbody>
        </table>
    
</div>
</div>
                    <div class="payment ml-30">
                        <h4 class="mb-30">Payment</h4>
                        <div class="payment_option">
                            <!-- <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="">
                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                            </div> -->
                            <!-- <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                            </div> -->
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="1">
                                <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">M-Pesa</label>
                            </div>
                            <input class="font-medium mb-1 coupon" name="telephone"  title="Mpesa Phone Number" placeholder="Telephone" type="text" required="" value="{{ old('telephone') }}" maxlength="9" pattern="8[4-5]\d{7}" title="8x xxx xxxx">
                        </div>
                       
                        <div class="payment-logo d-flex" >
                            <img class="mr-15" src="{{ asset('assets/mpesa.png') }}" alt="">
                            <!-- <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" alt="">
                            <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                            <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                            <img src="assets/imgs/theme/icons/payment-zapper.svg" alt=""> -->
                        </div>
                        <button href="#" class="btn btn-fill-out btn-block mt-30" type="submit">
                            Place an Order<i class="fi-rs-sign-out ml-15"></i>
                        </button>
                        <!-- <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a> -->
                    </div>
                    
                </div>
                
            </div>
        </div>
    </form>

   
        
@endsection
        