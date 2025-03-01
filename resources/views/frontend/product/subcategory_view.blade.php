@extends('frontend.master_dashboard')
@section('main')

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <h1 class="mb-15">{{$breadSubcat->subcategory_name}}</h1>
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> {{$breadSubcat->category->category_name}}<span></span> {{$breadSubcat->subcategory_name}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>Temos <strong class="text-brand">{{count($products)}}</strong> Para Voce!</p>
                </div>
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Mostrar:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">Todos</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="row product-grid">
            @foreach($products as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        @if ($product->getFirstMedia('cover'))
    {{ $product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;']) }}
@else
    <img src="{{ asset('upload/no_image.jpg') }}" style="width:400px; height:200px;" alt="No image available">
@endif                                         <!-- <img src="{{ $product->getFirstMedia('cover') }}" style="width:5000px; height:5000px;" alt="Imagem do Produto"> -->
                                        </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>


                                        @php
                                        $amount= $product->selling_price - $product->discount_price;
                                        $discount = ($amount/$product->selling_price)*100;
                                        @endphp 
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                        @if($product->discount_price === NULL || $product->discount_price == 0)                                            <span class="new">Novo</span>

                                            @else
                                            <span class="hot">{{round($discount)}}%</span>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $product['category']['category_name'] ?? 'Categoria não disponível' }}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            @if($product->vendor_id==NULL)
                                            <span class="font-small text-muted">Por <a href="vendor-details-1.html">Proprietário</a></span>

                                            @else
                                            <span class="font-small text-muted">Por <a href="vendor-details-1.html">{{$product['vendor']['name']}}</a></span>

                                            @endif
                                        </div>
                                        <div class="product-card-bottom">

                                        @if($product->discount_price === NULL || $product->discount_price == 0)                                        <div class="product-price">
                                                <span>{{$product->selling_price}} Mzn</span>
                                            </div>
                                        @else
                                        <div class="product-price">
                                        <span>{{$product->discount_price}} Mzn</span>
                                        <span class="old-price">{{$product->selling_price}} Mzn</span>
                                        </div>
                                        @endif
                                            
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Adcionar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            @endforeach
              
            </div>
            <!--product grid-->
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!--End Deals-->

            
        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Categoria</h5>
                <ul>
                    @foreach ($categories as $category)
                    @php
                    $product = APP\Models\Product::where ('category_id', $category->id)->get();
                    @endphp
                    <li>
                    <a href="shop-grid-right.html">{{ $category->getFirstMedia('categories')?->img()?->attributes(["style" =>'width:70px; height:40px;']) }} </a>
                    {{$category->category_name}}</a><span class="count">{{count($product)}}</span>
                    </li>
                    @endforeach
                   
                    
                </ul>
            </div>
            <!-- Product sidebar Widget -->
            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">Novos Produtos</h5>
                @foreach ($newProduct as $product )
                <div class="single-post clearfix">
                    <div class="image">
                        @if ($product->getFirstMedia('cover'))
                            {{ $product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;']) }}
                        @else
                            <img src="{{ asset('upload/no_image.jpg') }}" style="width:200px; height:100px;" alt="No image available">
                        @endif                     
                    </div>
                    <div class="content pt-10">
                        <p><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}} </a></p>
                            @if($product->discount_price === NULL)                                            <span class="new">Novo</span>
                            <p class="price mb-0 mt-5"></p>{{$product->selling_price }} Mzn</p>

                            @else
                            <p class="price mb-0 mt-5"></p>{{$product->discount_price }} Mzn</p>

                            @endif
                        <div class="product-rate">
                            <div class="product-rating" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div>
            

        </div>
    </div>
</div>

@endsection