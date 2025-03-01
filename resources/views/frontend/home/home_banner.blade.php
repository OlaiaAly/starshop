@php
$banners = App\Models\Banner::orderBy('banner_title', 'ASC')->limit(3)->get();
@endphp
<section class="banners mb-25">
                    <div class="container">
                        <div class="row">
                            @foreach($banners as $banner)
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                {{ $banner->getFirstMedia('Banner')?->img()?->attributes(["style" =>'width:600px; height:320px;  margin-right: 10px; border-radius: 4px; border: 1px solid #ddd;']) }}	
                                    <div class="banner-text">
                                        <h4>
                                            {{$banner->banner_title}}
                                        </h4>
                                        <a href="{{$banner->banner_url}}" class="btn btn-xs">Comprar Agora <i class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
</section>