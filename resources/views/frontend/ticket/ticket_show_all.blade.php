@extends('frontend.master_dashboard')

@section('main')
@php 
    $tickets = App\Models\Ticket::where('status', 1)->orderBy('id', 'ASC')->get(); 
@endphp 

<section class="ticket-section section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> Tickets</h3>
        </div>

        <div class="row product-grid-4">
            @foreach($tickets as $ticket)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                            <a href="{{ url('ticket/details/' . $ticket->id . '/' . $ticket->slug) }}">
                            @if ($ticket->getFirstMedia('cover'))
                                        {{ $ticket->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;']) }}
                                    @else
                                        <img src="{{ asset('upload/no_image.jpg') }}" style="width:400px; height:200px;" alt="Sem Imagem Disponível">
                                    @endif
                                </a>
                            </div>
                        </div>
                        
                        <div class="product-content-wrap mb-2">
                            <h5><a href="{{ url('ticket/details/' . $ticket->id . '/' . $ticket->slug) }}">{{ $ticket->event_name }}</a></h5><br>
                            <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($ticket->event_date)->format('d/m/Y H:i') }}</p>
                            <p><strong>Local:</strong> {{ $ticket->location }}</p>
                            <p><strong>Preço Normal:</strong> {{ $ticket->price_normal }} Mzn</p>
                            <p><strong>Preço VIP:</strong> {{ $ticket->price_vip ?? 'N/A' }} Mzn</p>
                        </div>
                        <div class="product-card-bottom">
                            <a href="{{ url('ticket/details/' . $ticket->id . '/' . $ticket->slug) }}" class="btn btn-primary">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection