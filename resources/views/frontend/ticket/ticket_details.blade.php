@extends('frontend.master_dashboard')

@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span>
            <span>{{ $ticket->event_name }}</span>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="ticket-detail accordion-detail">
                <!-- Gallery and Details -->
                <div class="row mb-4 mt-4">
                    <!-- Gallery -->
                    <div class="col-md-6 mb-4">
                        <div class="detail-gallery">
                            <figure class="border-radius-10">
                                @if($ticket->getFirstMedia('ticket'))
                                    <img src="{{ $ticket->getFirstMedia('ticket')->getUrl() }}" alt="Imagem do Ticket" class="img-fluid" style="width:900px; height:550px;">
                                @else
                                    <img src="{{ asset('upload/no_image.jpg') }}" alt="Imagem Padrão" class="img-fluid" style="width:900px; height:550px;">
                                @endif
                            </figure>
                        </div>
                    </div>

                    <!-- Ticket Details -->
                    <div class="col-md-6">
                        <div class="detail-info px-3">
                            <h2 class="title-detail mb-3">{{ $ticket->event_name }}</h2>
                            <p class="mb-2"><strong>Data:</strong> {{ \Carbon\Carbon::parse($ticket->event_date)->format('d/m/Y H:i') }}</p>
                            <p class="mb-2"><strong>Local:</strong> {{ $ticket->location }}</p>
                            <p class="mb-2"><strong>Preço Normal:</strong> {{ $ticket->price_normal }} Mzn</p>
                            <p class="mb-3"><strong>Preço VIP:</strong> {{ $ticket->price_vip ?? 'N/A' }} Mzn</p>
                            <p class="mb-3"><strong>Descrição:</strong> <br> {{ $ticket->description ?? 'N/A' }} Mzn</p>

                            <!-- Opção de Escolher Quantidade -->
                            <div class="detail-extralink mb-4">
                                <label for="normal_qty" class="me-2">Quantidade Normal:</label>
                                <input type="number" id="normal_qty" name="normal_quantity" value="1" min="0" max="{{ $ticket->quantity_normal }}" class="me-3" style="width: 60px;" />
                                
                                <label for="vip_qty" class="me-2">Quantidade VIP:</label>
                                <input type="number" id="vip_qty" name="vip_quantity" value="0" min="0" max="{{ $ticket->quantity_vip }}" style="width: 60px;" />
                            </div>

                            <!-- Botão de adicionar ao carrinho -->
                            <button type="button" onclick='addToCart()' class='btn btn-primary'><i class='fi-rs-shopping-cart me-2'></i>Adicionar ao carrinho</button>
                        </div>
                    </div>
                </div>

                <!-- Informações adicionais -->
                <hr>
                <div class="font-xs mt-4">
                    <ul class="list-unstyled">
                        <li class="mb-1"><strong>Código do Ticket:</strong> {{ $ticket->id }}</li>
                        <li><strong>Tags:</strong> {{ $ticket->tags }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
