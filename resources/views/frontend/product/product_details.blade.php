@extends('frontend.master_dashboard')
@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a
                href="shop-grid-right.html">{{ isset($product['category']['category_name']) ? $product['category']['category_name'] : 'Não informado' }}
            </a> <span></span>
            {{ isset($product['subcategory']['subcategory_name']) ? $product['subcategory']['subcategory_name'] : 'Não informado' }}<span></span>{{$product->product_name}}

        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                @if($product->getMedia('products')->isNotEmpty())
                                @foreach($product->getMedia('products') as $media)
                                <figure class="border-radius-10">
                                    <img src="{{ $media->getUrl() }}" alt="Imagem do Produto"
                                        style="width:900px; height:550px;">
                                </figure>
                                @endforeach
                                @else
                                <figure class="border-radius-10">
                                    <img src="{{ asset('upload/no_image.jpg') }}" alt="Imagem Padrão"
                                        style="width:900px; height:550px;">
                                </figure>
                                @endif



                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                @foreach($product->getMedia('products') as $media)
                                <div>
                                    <img src="{{ $media->getUrl() }}" alt="Imagem do Produto"
                                        style="width:100px; height:100px;">
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            @if($product->product_qty>0)
                            <span class="stock-status in-stock">Com Estoque </span>
                            @else
                            <span class="stock-status out-stock">Sem Estoque </span>

                            @endif

                            <h2 class="title-detail">{{$product->product_name}}</h2>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div  class="product-price primary-color float-left">
                                    <span class="current-price text-brand">{{$product->getPrice()}} Mzn</span>
                                </div>


                            {{--
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">X Mzn</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">-X %</span>
                                        <span class="old-price font-md ml-15">X  Mzn</span>
                                    </span>
                                </div> --}}
                            

                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{$product->short_descp}}</p>
                            </div>
                            @if(empty($product_size))
                            <p class="text-muted">Nenhum tamanho disponível</p>
                            @else
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Tamanho:</strong>
                                <select class="form-control unicase-form-control" name="size" id="_size">
                                    <option value="" selected="" disabled="">--Escolha O Tamanho--</option>
                                    @foreach($product_size as $size)
                                    <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            @if(empty($product_color))
                            <p class="text-muted">Nenhuma cor disponível</p>
                            @else
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10" style="width:70px;">Cor:</strong>
                                <select class="form-control unicase-form-control" name="color" id="_color">
                                    <option value="" selected="" disabled="">--Escolha a cor--</option>
                                    @foreach($product_color as $color)
                                    <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif



                        </div>


                        <div class="detail-extralink mb-50">
                            <div class="detail-qty border radius">
                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                <input type="text" name="quantity" class="qty-val" value="1" min="1"
                                    max="{{ $product->product_qty }}" oninput="checkMaxValue(this)" id="qtd">
                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                            </div>
                            <div class="product-extra-link2">
                                <button type="submit" class="button button-add-to-cart" id="add-to-cart"><i
                                        class="fi-rs-shopping-cart"></i>Adcionar ao carrinho</button>
                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i
                                        class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                                        class="fi-rs-shuffle"></i></a>
                            </div>
                        </div>

                        @if($product->vendor_id==NULL)
                        <h6> Vendido pelo <a href="#"><span class="text-danger"> Proprietário</span></a></h6>
                        @else
                        <h6>
                            Vendido pelo
                            @if(isset($product['vendor']) && isset($product['vendor']['name']))
                            <a href="#">
                                <span class="text-danger">{{$product['vendor']['name']}}</span>
                            </a>
                            @else
                            <span class="text-muted">Não especificado</span>
                            @endif
                        </h6>

                        @endif
                        <hr>
                        <div class="font-xs">
                            <ul class="mr-50 float-start">
                                <li class="mb-5">Marca:
                                    <span class="text-brand">
                                        {{ isset($product['brand']['brand_name']) ? $product['brand']['brand_name'] : 'Não informado' }}
                                    </span>
                                </li>
                                <li class="mb-5">Categoria:
                                    <span class="text-brand">
                                        {{ isset($product['category']['category_name']) ? $product['category']['category_name'] : 'Não informado' }}
                                    </span>
                                </li>
                                <li>Subcategoria:
                                    <span class="text-brand">
                                        {{ isset($product['subcategoria']['subcategory_name']) ? $product['subcategoria']['subcategory_name'] : 'Não informado' }}
                                    </span>
                                </li>
                            </ul>

                            <ul class="float-start">
                                <li class="mb-5">Codigo do produto: <a href="#">{{$product->product_code}}</a></li>

                                <li class="mb-5">Tags: <a href="#" rel="tag">{{$product->product_tags}}</a></li>

                                <li>Estoque:<span class="in-stock text-brand ml-5">{{$product->product_qty}} item no
                                        estoque</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Detail Info -->
                </div>
            </div>
            <div class="product-info">
                <div class="tab-style3">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                href="#Description">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                href="#Additional-info">Additional info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                        </li>
                    </ul>
                    <div class="tab-content shop_info_tab entry-main-content">
                        <div class="tab-pane fade show active" id="Description">
                            <div class="">
                                <p>{!! $product->long_descp !!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Additional-info">
                            <table class="font-md">
                                <tbody>
                                    <tr class="stand-up">
                                        <th>Stand Up</th>
                                        <td>
                                            <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                        </td>
                                    </tr>
                                    <tr class="folded-wo-wheels">
                                        <th>Folded (w/o wheels)</th>
                                        <td>
                                            <p>32.5″L x 18.5″W x 16.5″H</p>
                                        </td>
                                    </tr>
                                    <tr class="folded-w-wheels">
                                        <th>Folded (w/ wheels)</th>
                                        <td>
                                            <p>32.5″L x 24″W x 18.5″H</p>
                                        </td>
                                    </tr>
                                    <tr class="door-pass-through">
                                        <th>Door Pass Through</th>
                                        <td>
                                            <p>24</p>
                                        </td>
                                    </tr>
                                    <tr class="frame">
                                        <th>Frame</th>
                                        <td>
                                            <p>Aluminum</p>
                                        </td>
                                    </tr>
                                    <tr class="weight-wo-wheels">
                                        <th>Weight (w/o wheels)</th>
                                        <td>
                                            <p>20 LBS</p>
                                        </td>
                                    </tr>
                                    <tr class="weight-capacity">
                                        <th>Weight Capacity</th>
                                        <td>
                                            <p>60 LBS</p>
                                        </td>
                                    </tr>
                                    <tr class="width">
                                        <th>Width</th>
                                        <td>
                                            <p>24″</p>
                                        </td>
                                    </tr>
                                    <tr class="handle-height-ground-to-handle">
                                        <th>Handle height (ground to handle)</th>
                                        <td>
                                            <p>37-45″</p>
                                        </td>
                                    </tr>
                                    <tr class="wheels">
                                        <th>Wheels</th>
                                        <td>
                                            <p>12″ air / wide track slick tread</p>
                                        </td>
                                    </tr>
                                    <tr class="seat-back-height">
                                        <th>Seat back height</th>
                                        <td>
                                            <p>21.5″</p>
                                        </td>
                                    </tr>
                                    <tr class="head-room-inside-canopy">
                                        <th>Head room (inside canopy)</th>
                                        <td>
                                            <p>25″</p>
                                        </td>
                                    </tr>
                                    <tr class="pa_color">
                                        <th>Color</th>
                                        <td>
                                            <p>Black, Blue, Red, White</p>
                                        </td>
                                    </tr>
                                    <tr class="pa_size">
                                        <th>Size</th>
                                        <td>
                                            <p>M, S</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="Vendor-info">
                            <div class="vendor-logo d-flex mb-30">
                                <img src="{{(!empty($product->vendor->photo)) ? url('upload/vendor_images/'.$product->vendor->photo):url('upload/no_image.jpg')}}"
                                    alt="" />
                                <div class="vendor-name ml-15">
                                    @if($product->vendor_id==NULL)
                                    <h6>
                                        <a href="vendor-details-2.html">Proprietario</a>
                                    </h6>
                                    @else
                                    <h6>
                                        <h6>
                                            Vendido pelo
                                            @if(isset($product['vendor']) && isset($product['vendor']['name']))
                                            <a href="#">
                                                <span class="text-danger">{{$product['vendor']['name']}}</span>
                                            </a>
                                            @else
                                            <span class="text-muted">Não especificado</span>
                                            @endif
                                        </h6>
                                    </h6>
                                    @endif

                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                            </div>
                            @if($product->vendor_id==NULL)
                            <ul class="contact-infor mb-50">
                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}"
                                        alt="" /><strong>Enderenco: </strong> <span>Proprietario</span></li>
                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}"
                                        alt="" /><strong>Contacto:</strong><span>Proprietario</span></li>
                            </ul>
                            @else
                            <ul class="contact-infor mb-50">
                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}"
                                        alt="" /><strong>Enderenco: </strong> <span></span></li>
                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}"
                                        alt="" /><strong>Contacto:</strong><span></span></li>
                            </ul>
                            @endif

                            @if($product->vendor_id==NULL)
                            <p>Queres Saber o que?</p>
                            @else
                            <p></p>
                            @endif
                            <p></p>
                        </div>
                        <div class="tab-pane fade" id="Reviews">
                            <!--Comments-->
                            <div class="comments-area">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="mb-30">Customer questions & answers</h4>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex mb-30">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/blog/author-2.png" alt="" />
                                                        <a href="#" class="font-heading text-brand">Sienna</a>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between mb-10">
                                                            <div class="d-flex align-items-center">
                                                                <span class="font-xs text-muted">December 4, 2022 at
                                                                    3:12 pm </span>
                                                            </div>
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 100%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Delectus, suscipit exercitationem
                                                            accusantium obcaecati quos voluptate nesciunt facilis itaque
                                                            modi commodi dignissimos sequi repudiandae minus ab deleniti
                                                            totam officia id incidunt? <a href="#"
                                                                class="reply">Reply</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/blog/author-3.png" alt="" />
                                                        <a href="#" class="font-heading text-brand">Brenna</a>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between mb-10">
                                                            <div class="d-flex align-items-center">
                                                                <span class="font-xs text-muted">December 4, 2022 at
                                                                    3:12 pm </span>
                                                            </div>
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 80%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Delectus, suscipit exercitationem
                                                            accusantium obcaecati quos voluptate nesciunt facilis itaque
                                                            modi commodi dignissimos sequi repudiandae minus ab deleniti
                                                            totam officia id incidunt? <a href="#"
                                                                class="reply">Reply</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/blog/author-4.png" alt="" />
                                                        <a href="#" class="font-heading text-brand">Gemma</a>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between mb-10">
                                                            <div class="d-flex align-items-center">
                                                                <span class="font-xs text-muted">December 4, 2022 at
                                                                    3:12 pm </span>
                                                            </div>
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 80%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Delectus, suscipit exercitationem
                                                            accusantium obcaecati quos voluptate nesciunt facilis itaque
                                                            modi commodi dignissimos sequi repudiandae minus ab deleniti
                                                            totam officia id incidunt? <a href="#"
                                                                class="reply">Reply</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="mb-30">Customer reviews</h4>
                                        <div class="d-flex mb-30">
                                            <div class="product-rate d-inline-block mr-15">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <h6>4.8 out of 5</h6>
                                        </div>
                                        <div class="progress">
                                            <span>5 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                        </div>
                                        <div class="progress">
                                            <span>4 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                        <div class="progress">
                                            <span>3 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 45%"
                                                aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                        </div>
                                        <div class="progress">
                                            <span>2 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 65%"
                                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                        </div>
                                        <div class="progress mb-30">
                                            <span>1 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                        </div>
                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                    </div>
                                </div>
                            </div>
                            <!--comment form-->
                            <div class="comment-form">
                                <h4 class="mb-15">Add a review</h4>
                                <div class="product-rate d-inline-block mb-30"></div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <form class="form-contact comment_form" action="#" id="commentForm">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="comment" id="comment"
                                                            cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name" type="text"
                                                            placeholder="Name" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" id="email" type="email"
                                                            placeholder="Email" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="website" id="website"
                                                            type="text" placeholder="Website" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="button button-contactForm">Submit
                                                    Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-60">
                <div class="col-12">
                    <h2 class="section-title style-1 mb-30">Related products</h2>
                </div>
                <div class="col-12">
                    <div class="row related-products">
                        @foreach($relatedProduct as $product)
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"
                                            tabindex="0">
                                            @if ($product->getFirstMedia('cover'))
                                            {{ $product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;']) }}
                                            @else
                                            <img src="{{ asset('upload/no_image.jpg') }}"
                                                style="width:400px; height:200px;" alt="No image available">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                                class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                        @endphp
                                        @if($product->discount_price === NULL || $product->discount_price == 0)
                                        <span class="new">Novo</span>
                                        @else
                                        <span class="hot">{{ round($discount) }}%</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"
                                            tabindex="0">{{ $product->product_name }}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span> </span>
                                    </div>
                                    @if($product->discount_price === NULL || $product->discount_price == 0)
                                    <div class="product-price">
                                        <span>{{ $product->selling_price }} Mzn</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{ $product->discount_price }} Mzn</span>
                                        <span class="old-price">{{ $product->selling_price }} Mzn</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- Fim da coluna do produto -->
                        @endforeach
                    </div> <!-- Fim da linha de produtos relacionados -->
                </div> <!-- Fim da coluna -->
            </div> <!-- Fim da linha principal -->
        </div>
    </div>
</div>
</div>



<script>
    $(document).ready(function() {


        
        
        $('#add-to-cart').click(function(e) {
            e.preventDefault();
            var color = $('#_color').val();
            var size = $('#_size').val();
            var quantity = $('#qtd').val();

        $.ajax({
            url: @json(route('addToCard', ['id' => $product->id])),
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Token CSRF do Laravel
                quantity: quantity,
                options:{
                    color: color,
                    size: size
                }
            },
            success: function(response) {
                console.log(response);
                Swal.fire({
                    title: "Adicionado com sucesso!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#cart-message').html('<div class="alert alert-success">' + response.success + '</div>');
                updateCartButton($('#add-to-cart'));
                // Atualizar o mini carrinho ou outras partes da página
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
                $('#cart-message').html('<div class="alert alert-danger">Erro ao adicionar ao carrinho.</div>');
                console.error(xhr.responseText);
            }
        });
    });

    //ACTUALIZAR O BOTÃO DO CARRINHO	
    function updateCartButton(button) {
        button.html('<i class="fi-rs-check"></i> Adicionado'); // Altera o ícone e o texto
        button.prop("disabled", true); // Desabilita o botão temporariamente
        button.css({
            "ponter-events": "none",
            "cursor": "not-allowed",
            "opacity": "0.5"
        }); // Desabilita o clique no botão

        //DESATIVAR BOOTAR
        $('#_color').prop({
            disabled: true,
            readyonly: true
        });
        $('#_size').prop({
            disabled: true,
            readyonly: true
        });
        $('#qtd').prop({
            disabled: true,
            readyonly: true
        });
    }
});
</script>
@endsection