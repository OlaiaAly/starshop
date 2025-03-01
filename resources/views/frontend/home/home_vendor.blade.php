@php
$vendors=App\Models\User::where('status', 'active')->where('role', 'vendor')->orderBy('id', 'DESC')->limit(4)->get();

@endphp
<div class="container">

            <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                            <h3 class="">Todos Nossos Vendores</h3>
                            <a class="show-all" href="{{route('vendor.all')}}">
                                Todos Vendores
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>


                <div class="row vendor-grid">
                @foreach($vendors as $vendor)
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
                          
                        
                </div> 
</div>
