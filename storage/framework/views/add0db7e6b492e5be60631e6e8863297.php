<?php
$banners = App\Models\Banner::orderBy('banner_title', 'ASC')->limit(3)->get();
?>
<section class="banners mb-25">
                    <div class="container">
                        <div class="row">
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <?php echo e($banner->getFirstMedia('Banner')?->img()?->attributes(["style" =>'width:600px; height:320px;  margin-right: 10px; border-radius: 4px; border: 1px solid #ddd;'])); ?>	
                                    <div class="banner-text">
                                        <h4>
                                            <?php echo e($banner->banner_title); ?>

                                        </h4>
                                        <a href="<?php echo e($banner->banner_url); ?>" class="btn btn-xs">Comprar Agora <i class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
</section><?php /**PATH D:\Laravel\laravel10\resources\views/frontend/home/home_banner.blade.php ENDPATH**/ ?>