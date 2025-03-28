@php
$categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
@endphp

<section class="popular-categories section-padding">
                    <div class="container wow animate__animated animate__fadeIn">
                        <div class="section-title">
                            <div class="title">
                                <h3>Categorias</h3>
                            
                            </div>
                            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                        </div>
                        <div class="carausel-10-columns-cover position-relative">
                            <div class="carausel-10-columns" id="carausel-10-columns">
                                @foreach($categories as $category)
                                <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                    <figure class="img-hover-scale overflow-hidden">
                                            <a href="{{url('product/category/'.$category->id.'/'.$category->category_slug)}}">
                                            @if ($category->getFirstMedia('categories'))
                                            {{ $category->getFirstMedia('categories')->img()->attributes(["style" => 'width:200px; height:80px;']) }}
                                            @else
                                            <img src="{{ asset('upload/no_image.jpg') }}" style="width:200px; height:80px;" alt="No image available">
                                            @endif    
                                        <!-- {{ $category->getFirstMedia('categories')?->img()?->attributes(["style" =>'width:200px; height:80px;']) }}  -->
                                    </a>
                                    </figure>
                                    <h6><a href="{{url('product/category/'.$category->id.'/'.$category->category_slug)}}">{{$category->category_name}}</a></h6>
                                    @php
                                    $product = App\Models\Product::where('category_id',$category->id)->get();
                                    @endphp
                                    <span>{{count($product)}}</span>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>