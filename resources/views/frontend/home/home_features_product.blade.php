@php 
$featured = App\Models\Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
@endphp

<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class="">Produtos Em Promoção</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <!-- Banner opcional -->
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @foreach($featured as $product)
                                    @if(!empty($product->discount_price) && $product->discount_price > 0) <!-- Verifica se o produto tem desconto -->
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                        @php
                                                            $image = $product->getFirstMedia('cover');
                                                        @endphp
                                                        @if ($image)
                                                            {{ $image->img()->attributes(["style" => 'width:400px; height:200px;']) }}
                                                        @else
                                                            <img src="{{ asset('upload/no_image.jpg') }}" style="width:400px; height:200px;" alt="No image available">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                @php
                                                    $sellingPrice = $product->selling_price ?? 0;
                                                    $discountPrice = $product->discount_price ?? 0;
                                                    $amount = $sellingPrice - $discountPrice;
                                                    $discount = ($sellingPrice > 0) ? ($amount / $sellingPrice) * 100 : 0;
                                                @endphp
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">{{ round($discount) }}%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">{{ $product['category']['category_name'] ?? 'Categoria não disponível' }}</a>
                                                </div>
                                                <h2>
                                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                        {{ $product->product_name ?? 'Nome não disponível' }}
                                                    </a>
                                                </h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    @if($product->vendor_id == NULL)
                                                        <span class="font-small text-muted">Por <a href="#">Proprietário</a></span>
                                                    @else
                                                        <span class="font-small text-muted">Por <a href="#">{{ $product['vendor']['name'] ?? 'Vendedor não disponível' }}</a></span>
                                                    @endif
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        @if($product->discount_price)
                                                            <span>{{ $product->discount_price }} Mzn</span>
                                                            <span class="old-price">{{ $product->selling_price }} Mzn</span>
                                                        @else
                                                            <span>{{ $product->selling_price ?? 'Preço não disponível' }} Mzn</span>
                                                        @endif
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Adicionar</a>
                                                    </div>
                                                </div>
                                            </div> <!-- End product-content-wrap -->
                                        </div> <!-- End product-cart-wrap -->
                                    @endif
                                @endforeach
                            </div> <!-- End carausel-4-columns -->
                        </div> <!-- End carausel-4-columns-cover -->
                    </div> <!-- End tab-pane -->
                </div> <!-- End tab-content -->
            </div> <!-- End col-lg-9 -->
        </div> <!-- End row -->
    </div> <!-- End container -->
</section>

<!-- <script>
$(document).ready(function(){
    $('#carausel-4-columns').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        prevArrow: '<button class="slick-prev">Previous</button>',
        nextArrow: '<button class="slick-next">Next</button>',
        responsive: [
            { 
                breakpoint: 1024,
                settings: { slidesToShow: 2 }
            },
            { 
                breakpoint: 600,
                settings: { slidesToShow: 1 }
            }
        ]
    });
});
</script> -->
<script>
    $(document).ready(function() {
        $('#carausel-4-columns').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            prevArrow: '<button class="slick-prev"><i class="fi-rs-angle-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="fi-rs-angle-right"></i></button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
