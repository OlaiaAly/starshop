@php
$products = App\Models\Product::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
$categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
@endphp
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> Novos Productos </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                        type="button" role="tab" aria-controls="tab-one" aria-selected="true">Tudo</button>
                </li>
                @foreach($categories as $category)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="nav-tab-two" href="#category{{$category->id}}" data-bs-toggle="tab"
                        data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two"
                        aria-selected="false">{{$category->category_name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        @if ($product->getFirstMedia('cover'))
                                        {{ $product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;']) }}
                                        @else
                                        <img src="{{ asset('upload/no_image.jpg') }}" style="width:400px; height:200px;"
                                            alt="No image available">
                                        @endif
                                        <!-- {{ $product->getFirstMedia(collectionName: 'cover')?->img()?->attributes(["style" =>'width:400px; height:200px;']) }}     -->
                                        <!-- <img src="{{ $product->getFirstMedia('cover') }}" style="width:5000px; height:5000px;" alt="Imagem do Produto"> -->
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                            class="fi-rs-heart"></i></a>
                                    <!-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> -->
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal" id="{{$product->id}}"
                                        onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                </div>


                                @php
                                $amount= $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price)*100;
                                @endphp
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if($product->discount_price === NULL || $product->discount_price == 0) <span
                                        class="new">Novo</span>

                                    @else
                                    <span class="hot">{{round($discount)}}%</span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a
                                        href="shop-grid-right.html">{{ $product['category']['category_name'] ?? 'Categoria não disponível' }}</a>
                                </div>
                                <h2><a
                                        href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    @if($product->vendor_id==NULL)
                                    <span class="font-small text-muted">Por <a
                                            href="vendor-details-1.html">Proprietário</a></span>

                                    @else

                                    @endif
                                </div>
                                <div class="product-card-bottom">

                                    @if($product->discount_price === NULL || $product->discount_price == 0) <div
                                        class="product-price">
                                        <span>{{$product->selling_price}} Mzn</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{$product->discount_price}} Mzn</span>
                                        <span class="old-price">{{$product->selling_price}} Mzn</span>
                                    </div>
                                    @endif

                                    <div class="add-cart">
                                        <a class="add"
                                            href="{{route('product.details', ['id' => $product->id, 'slug' => 0 ])}}"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Adcionar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->

            @foreach($categories as $category)
            <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    @php
                    $catwiseProduct = App\Models\Product::where('category_id',
                    '$category->id')->orderBy('id','DESC')->get();
                    @endphp
                    @forelse($catwiseProduct as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        @if ($product->getFirstMedia('cover'))
                                        {{ $product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;']) }}
                                        @else
                                        <img src="{{ asset('upload/no_image.jpg') }}" style="width:400px; height:200px;"
                                            alt="Sem Imagem Disponivel">
                                        @endif </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                            class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal" id="{{$product->id}}"
                                        onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                </div>


                                @php
                                $amount= $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price)*100;
                                @endphp
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if($product->discount_price === NULL || $product->discount_price == 0)
                                    <span class="new">Novo</span>

                                    @else
                                    <span class="hot">{{round($discount)}}%</span>

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product['category']['category_name']}}</a>
                                </div>
                                <h2><a
                                        href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    @if($product->vendor_id==NULL)
                                    <span class="font-small text-muted">por <a href="vendor-details-1.html">Star
                                            Shop</a></span>

                                    @else
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">{{$product['vendor']['name']}}</a></span>

                                    @endif
                                </div>
                                <div class="product-card-bottom">

                                    @if($product->discount_price === NULL || $product->discount_price == 0) <div
                                        class="product-price">
                                        <span>{{$product->selling_price}} Mzn</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{$product->discount_price}} Mzn</span>
                                        <span class="old-price">{{$product->selling_price}} Mzn</span>
                                    </div>
                                    @endif

                                    <div class="add-cart">
                                        <a class="add" href="{{route('product.details', ['id' => $product->id, 'slug' => 0 ])}}"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Adcionar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    @empty
                    <h5 class="text-danger">Produto Nao Encontrado</h5>
                    @endforelse
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab two-->
            @endforeach

        </div>
        <!--End tab-content-->
    </div>
</section>