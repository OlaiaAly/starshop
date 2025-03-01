
<?php $__env->startSection('main'); ?>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span><?php echo e($vendor->name); ?> <span></span> Detalhes Do Artista
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="archive-header-2 text-center pt-80 pb-50">
                <h1 class="display-2 mb-50"><?php echo e($vendor->name); ?></h1>
                
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Temos <strong class="text-brand"><?php echo e(count($vendor_product)); ?></strong> para voce!</p>
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
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Organizar por:</span>
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
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">
                        
                    
<?php $__currentLoopData = $vendor_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                        <a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>">
                                        <?php if($product->getFirstMedia('cover')): ?>
    <?php echo e($product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;'])); ?>

<?php else: ?>
    <img src="<?php echo e(asset('upload/no_image.jpg')); ?>" style="width:400px; height:200px;" alt="No image available">
<?php endif; ?>                                        <!-- <img src="<?php echo e($product->getFirstMedia('cover')); ?>" style="width:5000px; height:5000px;" alt="Imagem do Produto"> -->
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
                                            <span class="font-small text-muted">Por <a href="">Proprietário</a></span>

                                            <?php else: ?>
                                            <span class="font-small text-muted">Por <a href="<?php echo e(route('vendor.details', $vendor->id)); ?>"><?php echo e($product['vendor']['name']); ?></a></span>

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
                    <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                        <div class="vendor-logo mb-30">
                        <img  style="width:150px; height:150px;" src="<?php echo e((!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo):url('upload/no_image.jpg')); ?>" alt="" />
                        </div>
                        <div class="vendor-info">
                            
                            <h4 class="mb-5"><a href="vendor-details-1.html" class="text-heading"><?php echo e($vendor->name); ?></a></h4>
                            <div class="product-rate-cover mb-15">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="vendor-des mb-30">
                                <p class="font-sm text-heading"><?php echo e($vendor->vendor_short_info); ?></p>
                            </div>
                            <div class="follow-social mb-20">
                                <h6 class="mb-15">Follow Us</h6>
                                <ul class="social-network">
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/social-tw.svg')); ?>" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/social-fb.svg')); ?>" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/social-insta.svg')); ?>" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/social-pin.svg')); ?>" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="vendor-info">
                                <ul class="font-sm mb-20">
                                    <li><img class="mr-5" src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-location.svg')); ?>" alt="" /><strong>Address: </strong> <span><?php echo e($vendor->address); ?></span></li>
                                    <li><img class="mr-5" src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-contact.svg')); ?>" alt="" /><strong>Call Us:</strong><span>(+258) <?php echo e($vendor->phone); ?></span></li>
                                </ul>
                                <a href="vendor-details-1.html" class="btn btn-xs">Contact Seller <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                   
                    <!-- Fillter By Price -->
                   
                    
                </div>
            </div>
        </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Cuata\laravel10\resources\views/frontend/vendor/vendor_details.blade.php ENDPATH**/ ?>