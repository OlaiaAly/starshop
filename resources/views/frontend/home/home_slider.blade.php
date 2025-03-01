@php
$slider = App\Models\Slider::orderBy('slider_title', 'ASC')->get();
@endphp
<section class="home-slider position-relative mb-30">
                    <div class="container">
                        <div class="home-slide-cover mt-30">
                            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
@foreach($slider as $item)

                                <!-- <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset('frontend/assets/imgs/slider/slider-1.png')}}"> -->
                                <div class="single-hero-slider single-animation-wrap" style="background-image: url('{{ $item->getFirstMediaUrl('slider') }}');">
                                <div class="slider-content">
                                        <h3 class="display-2 mb-40">
                                            {{$item->slider_title}}
                                        </h3>
                                        <p class="mb-65">{{$item->short_title}}</p>
                                        <form class="form-subcriber d-flex">
                                            <input type="email" placeholder="O seu endereço de e-mail" />
                                            <button class="btn" type="submit">Subscreve</button>
                                        </form>
                                    </div>
                                </div>
@endforeach
                            </div>
                            <div class="slider-arrow hero-slider-1-arrow"></div>
                        </div>
                    </div>
    </section>