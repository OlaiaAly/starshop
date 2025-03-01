<?php
$products = App\Models\Product::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
$categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
?>
<section class="product-tabs section-padding position-relative">
                    <div class="container">
                        <div class="section-title style-2 wow animate__animated animate__fadeIn">
                            <h3> Novos Productos </h3>
                            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"  data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Tudo</button>
                                </li>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="nav-tab-two" href="#category<?php echo e($category->id); ?>"data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false"><?php echo e($category->category_name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                        <a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>">
                                                <?php if($product->getFirstMedia('cover')): ?>
                                                    <?php echo e($product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;'])); ?>

                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('upload/no_image.jpg')); ?>" style="width:400px; height:200px;" alt="No image available">
                                                <?php endif; ?>
                                        <!-- <?php echo e($product->getFirstMedia(collectionName: 'cover')?->img()?->attributes(["style" =>'width:400px; height:200px;'])); ?>     -->
                                        <!-- <img src="<?php echo e($product->getFirstMedia('cover')); ?>" style="width:5000px; height:5000px;" alt="Imagem do Produto"> -->
                                        </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <!-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> -->
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="<?php echo e($product->id); ?>" onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
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
                            <!--En tab one-->

<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade" id="category<?php echo e($category->id); ?>" role="tabpanel" aria-labelledby="tab-two">
                                <div class="row product-grid-4">
<?php 
$catwiseProduct = App\Models\Product::where('category_id', '$category->id')->orderBy('id','DESC')->get();
?>
<?php $__empty_1 = true; $__currentLoopData = $catwiseProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="<?php echo e(url('product/details/'.$product->id.'/'.$product->product_slug)); ?>">
                                            <?php if($product->getFirstMedia('cover')): ?>
    <?php echo e($product->getFirstMedia('cover')->img()->attributes(["style" => 'width:400px; height:200px;'])); ?>

<?php else: ?>
    <img src="<?php echo e(asset('upload/no_image.jpg')); ?>" style="width:400px; height:200px;" alt="Sem Imagem Disponivel">
<?php endif; ?>                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="<?php echo e($product->id); ?>" onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                        </div>


                                        <?php
                                        $amount= $product->selling_price - $product->discount_price;
                                        $discount = ($amount/$product->selling_price)*100;
                                        ?> 
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                        <?php if($product->discount_price === NULL || $product->discount_price == 0): ?>                                            
                                        <span class="new">Novo</span>

                                            <?php else: ?>
                                            <span class="hot"><?php echo e(round($discount)); ?>%</span>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html"><?php echo e($product['category']['category_name']); ?></a>
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
                                            <span class="font-small text-muted">por <a href="vendor-details-1.html">Star Shop</a></span>

                                            <?php else: ?>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html"><?php echo e($product['vendor']['name']); ?></a></span>

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
                                    <!--end product card-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<h5 class="text-danger">Produto Nao Encontrado</h5>
<?php endif; ?>
                                </div>
                                <!--End product-grid-4-->
                            </div>
                            <!--En tab two-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                            
                        </div>
                        <!--End tab-content-->
                    </div>
                </section><?php /**PATH E:\Cuata\laravel10\resources\views/frontend/home/home_new_product.blade.php ENDPATH**/ ?>