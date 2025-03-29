@extends('frontend.master_dashboard')
@section('main')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop <span></span> Fillter
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <h1 class="heading-2 mb-10">Lista de Pedidos</h1>
                        <h6 class="text-body">Existe <span class="text-brand">{{$orders->count()}}</span> na sua lista</h6>
                    </div>
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col">Orders</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Criado</th>
                                    <th scope="col">Pedido em</th>
                                    <th scope="col" class="end">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <!-- <td class="image product-thumbnail pt-40"><img src="assets/imgs/shop/product-1-1.jpg" alt="#" /></td> -->
                                    <td class="product-des product-name">
                                        <h6><a class="product-name mb-10" href="#">{{$order->order_number}}</a></h6>
                                        <!-- <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div> -->
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h3 class="text-brand"> {{$order->total_price}}</h3>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <span class="stock-status in-stock mb-0"> {{$order->status}} </span>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <button class="btn btn-sm">{{$order->payment->method}}</button>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        {{$order->created_at->format('d-m-Y H:i:s')}}
                                        <!-- <button class="btn btn-sm">Add to cart</button> -->
                                    </td>
                                    <td class="action text-center" data-title="Remove">
                                        <a href="{{route('orders.pdf', $order->id)}}" class="text-body"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection