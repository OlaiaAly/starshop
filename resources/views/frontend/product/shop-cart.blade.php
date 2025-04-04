﻿@extends('frontend.master_dashboard')
@section('main')
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{$cart->items->count()}}</span> products in your cart</h6>
                        <h6 class="text-body"><a class="text-muted" onclick="deleteGeneral(`clear_card_{{$cart->id}}`, '', '', 'Tem certeza que deseja esvaziar o carrinho?')"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                        <form  id="clear_card_{{$cart->id}}" action="{{route('clear-cart', $cart->id)}}" method="get"></form>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->items as $cartItem)
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="image product-thumbnail pt-40"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">{{$cartItem->itemable->product_name}}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body">
                                            {{ number_format($cartItem->price, 2, '.', ' ') . ' MZN' }}

                                        </h4>
                                    </td>
                                    {{-- <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <input type="text" name="quantity" class="qty-val" value="{{$cartItem->quantity}}" min="1">
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </div>
                                    </td> --}}
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <!-- <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a> -->
                                                <input type="number" name="quantity" class="qty-val update-quantity"
                                                    data-id="{{$cartItem->id}}" value="{{$cartItem->quantity}}" min="1">
                                                <!-- <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a> -->
                                            </div>
                                        </div>
                                    </td>

                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand">
                                        {{ number_format($cartItem->subtotal, 2, '.', ' ') . ' MZN' }}

                                         </h4>
                                    </td>
                                    <td class="action text-center" data-title="Remove"><a href="#" class="text-body" onclick="deleteGeneral(`{{'delete_item_'.$cartItem->id}}`, ` o Item`)"><i class="fi-rs-trash"></i></a></td>
                                    <form  id="delete_item_{{$cartItem->id}}" action="{{route('deleteItem', $cartItem->id)}}" method="get"></form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   

                    <div class="row mt-50">
                        <div class="col-lg-5">
                        <div class="p-40">
                            <h4 class="mb-10">Apply Coupon</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                            <form action="{{route('applyCoupon')}}" method="post">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon" name="coupon_code" placeholder="Enter Your Coupon">
                                    <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>


                        <div class="col-lg-7">
                             <div class="divider-2 mb-30"></div>
                     


                            <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">
                                                {{ number_format($cart->total, 2, '.', ' ') . ' MZN' }}
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    @if($cart->coupon)
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Descontos</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h5 class="text-heading text-end">
                                                    {{ $cart->coupon->type == 'percentage' ? $cart->coupon->discount.' %' : $cart->coupon->discount.' MZN' }}
                                                </h5>
                                                </h4</td> </tr> 
                                                <!-- <tr> -->
                                            <!-- <td class="cart_total_label">
                                                <h6 class="text-muted">Estimate for</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h5 class="text-heading text-end">United Kingdom</h4</td> </tr> <tr>
                                            <td scope="col" colspan="2"> -->
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">
                                            {{ number_format($cart->total_discount?? $cart->total, 2, '.', ' ') . ' MZN' }}
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('checkout')}}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                        </div>


                    
                    </div>
                </div>
                 
            </div>
        </div>
    </main>
    <script>

$(document).ready(function () {
    let timeout = null; // Variável para armazenar o temporizador

    $('.update-quantity').on('click', function () {
        let $this = $(this); // Captura o botão clicado
        let cartItemId = $this.data('id'); // ID do item do carrinho

        // Cancela qualquer timeout anterior
        clearTimeout(timeout);

        // Define um novo timeout para aguardar 3 segundos antes de executar
        timeout = setTimeout(function() {
            let newQuantity = $this.val(); // Obtém o valor atualizado após o tempo de espera

            // Garante que a quantidade mínima seja 1
            if (newQuantity < 1) {
                $this.val(1);
                newQuantity = 1;
            }

            $.ajax({
                url: "{{ route('changeItems') }}", // Laravel route para atualizar o carrinho
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token para segurança
                    id: cartItemId,
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                    title: "Adicionado com sucesso!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            location.reload(); // Reload only after the alert disappears
                        }
                    });

                    // Atualizar mini carrinho ou outras partes da página
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "My bad...!",
                    });
                    console.error(xhr.responseText);
                }
            });
        }, 2000); // Aguarda 2 segundos antes de executar a requisição AJAX
    });
});



    function  deleteGeneral(id, name, type, messege){
        Swal.fire({
            title: messege??`<small>Tem certeza, que deseja apagar<br/> ${type??''}:  ${name??''} ?`,
            text: `Essa ação é irreversivel!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, tenho.'
        })
        .then((result) => {
            console.log(result)
            // if (result.isConfirmed) {
            if(result.value){
                console.log('deleted');
                $(`form#${id}`).submit();s
            }
        });
    }
// });

    </script>
@endsection