<?php
$categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
?>

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
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                    <figure class="img-hover-scale overflow-hidden">
                                            <a href="<?php echo e(url('product/category/'.$category->id.'/'.$category->category_slug)); ?>">
                                            <?php if($category->getFirstMedia('categories')): ?>
                                            <?php echo e($category->getFirstMedia('categories')->img()->attributes(["style" => 'width:200px; height:80px;'])); ?>

                                            <?php else: ?>
                                            <img src="<?php echo e(asset('upload/no_image.jpg')); ?>" style="width:200px; height:80px;" alt="No image available">
                                            <?php endif; ?>    
                                        <!-- <?php echo e($category->getFirstMedia('categories')?->img()?->attributes(["style" =>'width:200px; height:80px;'])); ?>  -->
                                    </a>
                                    </figure>
                                    <h6><a href="<?php echo e(url('product/category/'.$category->id.'/'.$category->category_slug)); ?>"><?php echo e($category->category_name); ?></a></h6>
                                    <?php
                                    $product = App\Models\Product::where('category_id',$category->id)->get();
                                    ?>
                                    <span><?php echo e(count($product)); ?></span>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </section><?php /**PATH C:\Users\Cuata\Desktop\starshop\resources\views/frontend/home/home_features_category.blade.php ENDPATH**/ ?>