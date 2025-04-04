﻿@extends('frontend.master_dashboard')
@section('main')
    <div class="invoice invoice-content invoice-2">
        <div class="back-top-home hover-up mt-30 ml-30">
            <a class="hover-up" href="index.html"><i class="fi-rs-home mr-5"></i> Homepage</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-numb">
                                            <h4 class="invoice-header-1 mb-10 mt-20">Oreder No: <span class="text-brand">#{{$order->order_number}}</span></h4>
                                            <h6 class="">
                                                Date: {{$order->created_at->format('d M Y')}}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-name text-end">
                                            <div class="logo">
                                                <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                                                <p class="text-sm text-mutted">Localização da empresa <br> Moçambique</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-lg-9 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Facturado para</h4>
                                            <p class="invoice-addr-1">
                                                <strong>{{$order->payment->name}}</strong> <br />
                                                {{$order->payment->email}} <br />
                                                {{$order->payment->address}}, <br /> Moçambique                                           </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="invoice-number">
                                            <!-- Vendor details -->
                                            <h4 class="invoice-title-1 mb-10">Bill To</h4>
                                            <p class="invoice-addr-1">
                                                <strong>NestMart Inc</strong> <br />
                                                billing@NestMart.com <br />
                                                205 North Michigan Avenue, <br />Suite 810 Chicago, 60601, USA
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-9 col-md-6">
                                        <h4 class="invoice-title-1 mb-10">Prazo:</h4>
                                        {{ \Carbon\Carbon::parse($order->expire_at)->format('d-m-Y') }}
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                        <p class="invoice-from-1">{{ucwords( $order->payment->method->value )}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Item Item</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->items as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{$item->product->product_name}}</span>
                                                        @php
                                                            $options = json_decode($item->options, true);
                                                    
                                                        @endphp
                                                        @if($options)
                                                            @foreach ($options as $key => $value) 
                                                                <small> {{ ucwords($key) }}: {{ ucwords($value) }} </small>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$item->price}}</td>
                                                <td class="text-center">{{$item->quantity}}</td>
                                                <td class="text-right">
                                                    {{ number_format($item->subtotal, 2, '.', ' ') . ' MZN' }}

                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>Blue Diamond Almonds Lightly Salted</span>
                                                        <small>SKU: FWM15VKT</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">$20.00</td>
                                                <td class="text-center">3</td>
                                                <td class="text-right">$60.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>Fresh Organic Mustard Leaves Bell Pepper</span>
                                                        <small>SKU: KVM15VK</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">$640.00</td>
                                                <td class="text-center">1</td>
                                                <td class="text-right">$640.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>All Natural Italian-Style Chicken Meatballs</span>
                                                        <small>SKU: 98HFG</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">$240.00</td>
                                                <td class="text-center">1</td>
                                                <td class="text-right">$240.00</td>
                                            </tr> -->





                                            <!-- ORHERS -->
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                <td class="text-right">
                                                    {{ number_format($order->total_price, 2, '.', ' ') . ' MZN' }}
                                                </td>
                                            </tr>
            
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Desconto</td>
                                                <td class="text-right">
                                                    @if($order->coupon_code)
                                                        {{ number_format(100 - ($order->discount_amount / $order->total_price) * 100, 2, '.', ' ') . '%' }}
                                                    @else
                                                        {{ number_format(0, 2, '.', ' ') . '%' }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                <td class="text-right f-w-600">
                                                    {{ number_format($order->discount_amount?? $order->total_price, 2, '.', ' ') . ' MZN' }}

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h3 class="invoice-title-1">Important Note</h3>
                                            <ul class="important-notes-list-1">
                                                <li>All amounts shown on this invoice are in US dollars</li>
                                                <li>finance charge of 1.5% will be made on unpaid balances after 30 days.</li>
                                                <li>Once order done, money can't refund</li>
                                                <li>Delivery might delay due to some external dependency</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-offsite">
                                        <div class="text-end">
                                            <p class="mb-0 text-13">Thank you for your business</p>
                                            <p><strong>AliThemes JSC</strong></p>
                                            <div class="mobile-social-icon mt-50 print-hide">
                                                <h6>Follow Us</h6>
                                                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                                                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="assets/imgs/theme/icons/icon-print.svg" alt="" /> Print </a>
                            <!-- <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img src="assets/imgs/theme/icons/icon-download.svg" alt="" /> Download </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- INVOICE -->
    <script src="assets/js/invoice/jspdf.min.js"></script>
    <script src="assets/js/invoice/invoice.js"></script>
    <!-- ENF OF INVOICE -->
    @endsection