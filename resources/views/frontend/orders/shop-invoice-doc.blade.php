
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Star Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content ="{{csrf_token()}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

<!-- jQuery (Necessário) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css?v=5.3')}}" />

<!-- CSS do Slick Carousel -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
<!-- SWEET ALERT -->
<link rel="stylesheet" href="{{asset('frontend\assets\css\sweetalert2.css')}}" />
<!-- jQuery (necessário para o Slick Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS do Slick Carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<!-- LOADING -->
 <link rel="stylesheet" href="{{asset('frontend\assets\css\loading.css')}}" />
 
<!-- SWEAT ALERT -->
<script src="{{asset('frontend\assets\js\sweetalert2.js')}}"></script>
</head>

<body>
    <div class="invoice invoice-content invoice-2">

        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-inner">
                            <!-- MAIN -->
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
                                                    <p class="text-sm text-mutted">205 North Michigan Avenue, Suite 810 <br> Chicago, 60601, USA</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-top">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-6">
                                            <div class="invoice-number">
                                                <h4 class="invoice-title-1 mb-10">Invoice To</h4>
                                                <p class="invoice-addr-1">
                                                    <strong>AliThemes Pty Ltd</strong> <br />
                                                    contactalithemes.com <br />
                                                    PO Box 16122, Collins Street West, <br />Australia
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="invoice-number">
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
                                            <h4 class="invoice-title-1 mb-10">Due Date:</h4>
                                            <p class="invoice-from-1">30 November 2022</p>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                            <p class="invoice-from-1">Via Paypal</p>
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
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>Field Roast Chao Cheese Creamy Original</span>
                                                            <small>SKU: FWM15VKT</small>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$10.99</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$10.99</td>
                                                </tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                    <td class="text-right">$1710.99</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">Tax</td>
                                                    <td class="text-right">$85.99</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                    <td class="text-right f-w-600">$1795.99</td>
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
                            <!-- mAIN -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>

</html>