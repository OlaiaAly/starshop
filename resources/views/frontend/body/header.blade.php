<header class="header-area header-style-1 header-height-2">
        <!-- <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div> -->
        <!-- <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                
                                <li><a href="page-account.html">My Cart</a></li>
                                <li><a href="shop-wishlist.html">Checkout</a></li>
                                <li><a href="shop-order.html">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Use o Cupom de desconto</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today</li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                               
                                <li>
                                    <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-fr.png')}}" alt="" />Français</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-dt.png')}}" alt="" />Deutsch</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('frontend/assets/imgs/theme/flag-ru.png')}}" alt="" />Pусский</a>
                                        </li>
                                    </ul>
                                </li>

                                 <li>Precisa de Ajuda? liga: <strong class="text-brand"> +258 842348705</strong></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{url('/')}}"><img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option>Todas as categorias</option>
                                    <option>Milks and Dairies</option>
                                    <option>Wines & Alcohol</option>
                                    <option>Clothing & Beauty</option>
                                    <option>Pet Foods & Toy</option>
                                    <option>Fast food</option>
                                    <option>Baking material</option>
                                    <option>Vegetables</option>
                                    <option>Fresh Seafood</option>
                                    <option>Noodles & Rice</option>
                                    <option>Ice cream</option>
                                </select>
                                <input type="text" placeholder="Pesquisar Por Produto..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <!-- <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Alabama</option>
                                            <option>Alaska</option>
                                            <option>Arizona</option>
                                            <option>Delaware</option>
                                            <option>Florida</option>
                                            <option>Georgia</option>
                                            <option>Hawaii</option>
                                            <option>Indiana</option>
                                            <option>Maryland</option>
                                            <option>Nevada</option>
                                            <option>New Jersey</option>
                                            <option>New Mexico</option>
                                            <option>New York</option>
                                        </select>
                                    </form>
                                </div> -->
                               
                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist.html">
                                        <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                        <span class="pro-count blue">6</span>
                                    </a>
                                    <a href="shop-wishlist.html"><span class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="shop-cart.html">
                                        <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                        <span class="pro-count blue">2</span>
                                    </a>
                                    <a href="{{route('openCard')}}"><span class="lable">Carrinhos</span></a>
                                    @php
                                        $user = auth()->user();
                                        if ($user) {
                                            $cart = \App\Models\Cart::firstOrCreate(['user_id' => $user->id]);
                                            $cart->load('items');
                                        } else {
                                            $cart = null;
                                        }
                                    @endphp
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                        @if($cart && $cart->items->count() > 0)
                                                @foreach($cart->items as $item)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="shop-product-right.html">{{ucwords( $item->itemable->product_name)}}</a></h4>
                                                        <h4><span>{{$item->quantity}} × </span>{{ number_format($item->subtotal, 2, '.', ' ') . ' MZN' }}
                                                        </h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @endif

                                            <!-- <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-2.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Corduroy Shirts</a></h4>
                                                    <h4><span>1 × </span>$3200.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li> -->
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>{{ number_format($cart->total, 2, '.', ' ') . ' MZN' }}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('openCard')}}" class="outline">View cart</a>
                                                <a href="{{route('openCard')}}">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{route('dashboard')}}">
                                        <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}}" />
                                    </a>

@auth
<a href="{{route('dashboard')}}"><span class="lable ml-0"> {{ Auth::user()->name}} </span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{route('dashboard')}}"><i class="fi fi-rs-user mr-10"></i>Minha Conta</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="{{route('get.orders')}}"><i class="fi fi-rs-label mr-10"></i>Meus Pedidos</a>
                                            </li>
                                            <li>
                                                <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>Minha Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <a href="{{route('user.logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Sair</a>
                                            </li>
                                        </ul>
                                    </div>

@else
<a href="{{route('login')}}"><span class="lable ml-0">Login</span></a>
<span class="lable ml" style="margin-left:3px; margin-right:3px;">|</span>
<a href="{{route('register')}}"><span class="lable ml-0">Candastrar</span></a>



@endauth



                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







@php
$categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
@endphp
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span>   Todas as Categorias
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach($categories as $item)
                                        <li>
                                            <a href="{{url('product/category/'.$item->id.'/'.$item->category_slug)}}"> {{ $item->getFirstMedia('categories')?->img()?->attributes(["style" =>'width:70px; height:40px;']) }} {{$item->category_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                    @foreach($categories as $item)
                                        <li>
                                            <a href="{{url('product/category/'.$item->id.'/'.$item->category_slug)}}"> {{ $item->getFirstMedia('categories')?->img()?->attributes(["style" =>'width:70px; height:40px;']) }} {{$item->category_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="more_slide_open" style="display: none">
                                    <div class="d-flex categori-dropdown-inner">
                                        <ul>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="{{asset('frontend/assets/imgs/theme/icons/icon-1.svg')}}" alt="" />Milks and Dairies</a>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="{{asset('frontend/assets/imgs/theme/icons/icon-2.svg')}}" alt="" />Clothing & beauty</a>
                                            </li>
                                        </ul>
                                        <ul class="end">
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="{{asset('assets/imgs/theme/icons/icon-3.svg')}}" alt="" />Wines & Drinks</a>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="{{asset('assets/imgs/theme/icons/icon-4.svg')}}" alt="" />Fresh Seafood</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    
                                    <li>
                                        <a class="active" href="{{url('/')}}">Home  </a>
                                        
                                    </li>
@php
$categories = App\Models\Category::orderBy('category_name', 'ASC')->limit(5)->get();
@endphp

@foreach($categories as $category)
                                    <li>
                                        <a href="{{url('product/category/'.$category->id.'/'.$category->category_slug)}}">{{$category->category_name}}<i class="fi-rs-angle-down"></i></a>

                                        @php
                                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name', 'ASC')->get();
                                        @endphp


                                        <ul class="sub-menu">
                                        @foreach($subcategories as $subcategory)

                                            <li><a href="{{url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug)}}">{{$subcategory->subcategory_name}}</a></li>
                                        @endforeach
                                        </ul>
                                    </li>
@endforeach                        
                                    <li>
                                        <a href="/tickets">Tickets</a>
                                    </li>
                                    <li>
                                        <a href="page-contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>


                    <div class="hotline d-none d-lg-flex">
                        <img src="{{asset('frontend/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                        <p>+258 842348705<span>Atendimento Ao Cliente 24/7</span></p>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{route('openCard')}}">
                                    <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @php
                                            $userId = auth()->user()->id??null;
                                            $cart = $userId ? \Binafy\LaravelCart\Models\Cart::firstOrCreate(['user_id' => $userId ]) : null;
                                        @endphp
                                        @if($cart)
                                            @foreach($cart ->items as $item)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">{$cart->itemeble->product_name}}</a></h4>
                                                    <h3><span>{{$cart->quantity}} × </span>{{$cart->price}}</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            @endforeach
                                        @endif   
                                        {{--
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{asset('frontend/assets/imgs/shop/thumbnail-4.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                    <h3><span>1 × </span>$3500.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li> 
                                        --}}
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>