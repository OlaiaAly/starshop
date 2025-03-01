@extends('frontend.master_dashboard')
@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Vendors List
        </div>
    </div>
</div>
<div class="page-content pt-50">
    <div class="container">
        <div class="archive-header-2 text-center">
            <h1 class="display-2 mb-50">Lista De Artistas</h1>
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" placeholder="Pesquisar Artista..." />
                                <button type="submit"><i class="fi-rs-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-50">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>Temos <strong class="text-brand">{{count($vendor)}}</strong> Artistas Cadatrados</p>
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
                                    <li><a href="#">All</a></li>
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
                                    <li><a class="active" href="#">Mall</a></li>
                                    <li><a href="#">Featured</a></li>
                                    <li><a href="#">Preferred</a></li>
                                    <li><a href="#">Total items</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>


        
        <div class="row vendor-grid">
        @foreach($vendor as $vendor)
                            <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
                                <div class="vendor-wrap mb-40">
                                    <div class="vendor-img-action-wrap">
                                        <div class="vendor-img">
                                            <a href="{{route('vendor.details', $vendor->id)}}">
                                            <img  style="width:150px; height:150px;" src="{{(!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo):url('upload/no_image.jpg')}}" alt="" />
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <div class="vendor-content-wrap">
                                        <div class="d-flex justify-content-between align-items-end mb-30">
                                            <div>
                                            
                                                <h4 class="mb-5"><a href="{{route('vendor.details', $vendor->id)}}">{{$vendor->name}}</a></h4>
                                                <div class="product-rate-cover">
                                                @php 
                                                $product=App\Models\Product::where('vendor_id', $vendor->id)->get();
                                                @endphp
                                                <span class="font-small total-product">Tem {{count($product)}} Produtos</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="vendor-info mb-30">
                                            <ul class="contact-infor text-muted">
                                                
                                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Contacto:</strong><span>(+258) {{$vendor->phone}}</span></li>
                                            </ul>
                                        </div>
                                        <a href="{{route('vendor.details', $vendor->id)}}" class="btn btn-xs">Ver Product<i class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                @endforeach
            <!--end vendor card-->

        </div>
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
    </div>
</div>

@endsection