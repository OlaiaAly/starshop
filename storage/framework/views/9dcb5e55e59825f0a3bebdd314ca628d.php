<?php $__env->startSection('main'); ?>
<?php echo $__env->make('frontend.home.home_slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!--End hero slider-->
<?php echo $__env->make('frontend.home.home_features_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--End category slider-->
<?php echo $__env->make('frontend.home.home_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--End banners-->
<?php echo $__env->make('frontend.home.home_new_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--Products Tabs-->
<?php echo $__env->make('frontend.home.home_features_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <!--End Best Sales-->
                  <!-- TV Category -->

            <section class="product-tabs section-padding position-relative">
                    <div class="container">
                        <div class="section-title style-2 wow animate__animated animate__fadeIn">
                            <h3><?php echo e($skip_category_0->category_name); ?></h3>
                        
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">
                                    <?php $__currentLoopData = $skip_product_0; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                            <a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>">
                                            <?php if($product->getFirstMedia('cover')): ?>
                                                    <?php echo e($product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;'])); ?>

                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('upload/no_image.jpg')); ?>" style="width:400px; height:200px;" alt="No image available">
                                                <?php endif; ?>                                            <!-- <img src="<?php echo e($product->getFirstMedia('cover')); ?>" style="width:5000px; height:5000px;" alt="Imagem do Produto"> -->
                                            </a>
                                            
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>


                                            <?php
                                            $amount= $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price)*100;
                                            ?> 
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                            <?php if($product->discount_price === NULL || $product->discount_price == 0): ?>                                            <span class="new">Novo</span>

                                                <?php else: ?>
                                                <span class="hot"><?php echo e(round($discount)); ?>%</span>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html"><?php echo e($product['category']['category_name'] ?? 'Categoria não disponível'); ?></a>
                                            </div>
                                            <h2><a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>"><?php echo e($product->product_name); ?></a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <?php if($product->vendor_id==NULL): ?>
                                                <span class="font-small text-muted">Por <a href="vendor-details-1.html">Proprietário</a></span>

                                                <?php else: ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="product-card-bottom">

                                            <?php if($product->discount_price === NULL || $product->discount_price == 0): ?>                                        <div class="product-price">
                                                    <span><?php echo e($product->selling_price); ?> Mzn</span>
                                                </div>
                                            <?php else: ?>
                                            <div class="product-price">
                                            <span><?php echo e($product->discount_price); ?> Mzn</span>
                                            <span class="old-price"><?php echo e($product->selling_price); ?> Mzn</span>
                                            </div>
                                            <?php endif; ?>
                                                
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Adcionar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                                <!--End product-grid-4-->
                        </div>
                        
                        
                        </div>
                        <!--End tab-content-->
                    </div>


            </section>
                <!--End TV Category -->


                <!-- Tshirt Category -->

                <section class="product-tabs section-padding position-relative">
                    <div class="container">
                        <div class="section-title style-2 wow animate__animated animate__fadeIn">
                            <h3><?php echo e($skip_category_2->category_name); ?></h3>
                        
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">
                                    <?php $__currentLoopData = $skip_product_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                            <a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>">
                                            <?php if($product->getFirstMedia('cover')): ?>
    <?php echo e($product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;'])); ?>

<?php else: ?>
    <img src="<?php echo e(asset('upload/no_image.jpg')); ?>" style="width:400px; height:200px;" alt="No image available">
<?php endif; ?>                                            <!-- <img src="<?php echo e($product->getFirstMedia('cover')); ?>" style="width:5000px; height:5000px;" alt="Imagem do Produto"> -->
                                            </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>


                                            <?php
                                            $amount= $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price)*100;
                                            ?> 
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                            <?php if($product->discount_price === NULL || $product->discount_price == 0): ?>                                            <span class="new">Novo</span>

                                                <?php else: ?>
                                                <span class="hot"><?php echo e(round($discount)); ?>%</span>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html"><?php echo e($product['category']['category_name'] ?? 'Categoria não disponível'); ?></a>
                                            </div>
                                            <h2><a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>"><?php echo e($product->product_name); ?></a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <?php if($product->vendor_id==NULL): ?>
                                                <span class="font-small text-muted">Por <a href="vendor-details-1.html">Proprietário</a></span>

                                                <?php else: ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="product-card-bottom">

                                            <?php if($product->discount_price === NULL || $product->discount_price == 0): ?>                                        <div class="product-price">
                                                    <span><?php echo e($product->selling_price); ?> Mzn</span>
                                                </div>
                                            <?php else: ?>
                                            <div class="product-price">
                                            <span><?php echo e($product->discount_price); ?> Mzn</span>
                                            <span class="old-price"><?php echo e($product->selling_price); ?> Mzn</span>
                                            </div>
                                            <?php endif; ?>
                                                
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Adcionar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                                <!--End product-grid-4-->
                        </div>
                        
                        
                        </div>
                        <!--End tab-content-->
                    </div>


            </section>
                <!--End Tshirt Category -->


        





                <!-- Computer Category -->

            <section class="product-tabs section-padding position-relative">
                    <div class="container">
                        <div class="section-title style-2 wow animate__animated animate__fadeIn">
                            <h3>Computer Category </h3>
                        
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">



                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-1-1.jpg')); ?>" alt="" />
                                                        <img class="hover-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-1-2.jpg')); ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Snack</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown,   </a></h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>$28.85</span>
                                                        <span class="old-price">$32.8</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end product card-->



                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-2-1.jpg')); ?>" alt="" />
                                                        <img class="hover-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-2-2.jpg')); ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken Meatballs</a></h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Stouffer</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>$52.85</span>
                                                        <span class="old-price">$55.8</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end product card-->
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-3-1.jpg')); ?>" alt="" />
                                                        <img class="hover-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-3-2.jpg')); ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Snack</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle Corn</a></h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 85%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">StarKist</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>$48.85</span>
                                                        <span class="old-price">$52.8</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end product card-->
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-4-1.jpg')); ?>" alt="" />
                                                        <img class="hover-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-4-2.jpg')); ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Vegetables</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo </a></h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>$17.85</span>
                                                        <span class="old-price">$19.8</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end product card-->


                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".5s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-5-1.jpg')); ?>" alt="" />
                                                        <img class="hover-img" src="<?php echo e(asset('frontend/assets/imgs/shop/product-5-2.jpg')); ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="best">-14%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Pet Foods</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted Vegetables</a></h2>
                                                <div class="product-rate-cover">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>$23.85</span>
                                                        <span class="old-price">$25.8</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end product card-->
                                
                                </div>
                                <!--End product-grid-4-->
                            </div>
                        
                        
                        </div>
                        <!--End tab-content-->
                    </div>


        </section>
                <!--End Computer Category -->




                <section class="section-padding mb-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-1.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-2.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-3.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-4.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Organic Cage-Free Grade A Large Brown Eggs</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-5.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red Rice</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-6.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Naturally Flavored Cinnamon Vanilla Light Roast Coffee</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-7.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Pepperidge Farm Farmhouse Hearty White Bread</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-8.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Organic Frozen Triple Berry Blend</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-9.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Oroweat Country Buttermilk Bread</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-10.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo Wings</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-11.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle Corn</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img src="<?php echo e(asset('frontend/assets/imgs/shop/thumbnail-12.jpg')); ?>" alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">All Natural Italian-Style Chicken Meatballs</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End 4 columns-->




        <!--Vendor List -->
        <?php echo $__env->make('frontend.home.home_vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--End Vendor List -->
        <?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Cuata\Desktop\ALY\starshop\resources\views/frontend/index.blade.php ENDPATH**/ ?>