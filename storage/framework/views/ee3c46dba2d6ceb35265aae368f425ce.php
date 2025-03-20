<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Star Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content ="<?php echo e(csrf_token()); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

<!-- jQuery (Necessário) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/plugins/animate.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css?v=5.3')); ?>" />

<!-- CSS do Slick Carousel -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
<!-- SWEET ALERT -->
<link rel="stylesheet" href="<?php echo e(asset('frontend\assets\css\sweetalert2.css')); ?>" />
<!-- jQuery (necessário para o Slick Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS do Slick Carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<!-- LOADING -->
 <link rel="stylesheet" href="<?php echo e(asset('frontend\assets\css\loading.css')); ?>" />
 
<!-- SWEAT ALERT -->
<script src="<?php echo e(asset('frontend\assets\js\sweetalert2.js')); ?>"></script>
</head>

<body>

    <?php if(session('success')): ?>
        <div class="alert success" style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; z-index: 1000;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert error" style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; z-index: 1000;">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <script>
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(el => el.style.display = 'none');
            }, 3000); // Esconde após 3 segundos
        });
    </script>


    <!-- Modal -->
 
    <!-- Quick view -->
<?php echo $__env->make('frontend.body.quickview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header  -->
<?php echo $__env->make('frontend.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <!-- End Header  -->




    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="<?php echo e(asset('frontend/assets/imgs/theme/logo.svg')); ?>" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="index.html">Home</a>
                                 
                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop-grid-right.html">shop</a>
                                <ul class="dropdown">
                                    <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                    <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                    <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                    <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                    <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                            <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                            <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                            <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-filter.html">Shop – Filter</a></li>
                                    <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                    <li><a href="{route('openCard')}">Shop – Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop – Compare</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Invoice</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                            <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                            <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                            <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                            <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                            <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="menu-item-has-children">
                                <a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Dresses</a></li>
                                            <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                            <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="shop-product-right.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Jackets</a></li>
                                            <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                            <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                            <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                            <li><a href="shop-product-right.html">Tablets</a></li>
                                            <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                            <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="blog-category-fullwidth.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                    <li><a href="blog-category-list.html">Blog Category List</a></li>
                                    <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                    <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                            <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                            <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-account.html">My Account</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-forgot-password.html">Forgot password</a></li>
                                    <li><a href="page-reset-password.html">Reset password</a></li>
                                    <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                    <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Terms of Service</a></li>
                                    <li><a href="page-404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+258) 842348705 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')); ?>" alt="" /></a>
                    <a href="#"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')); ?>" alt="" /></a>
                    <a href="#"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')); ?>" alt="" /></a>
                    <a href="#"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg')); ?>" alt="" /></a>
                    <a href="#"><img src="<?php echo e(asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg')); ?>" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2024 © TCC. Todos Direitos Reservados. Criado por Cuata</div>
            </div>
        </div>
    </div>
    <!--End header-->








    <main class="main">
     <?php echo $__env->yieldContent('main'); ?>

    </main>

<?php echo $__env->make('frontend.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="<?php echo e(asset('frontend/assets/imgs/theme/loading.gif')); ?>" alt="" />
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor JS-->
    <script src="<?php echo e(asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.syotimer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/images-loaded.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/scrollup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.vticker-min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.theia.sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/plugins/jquery.elevatezoom.js')); ?>"></script>
    <!-- Template  JS -->
    <script src="<?php echo e(asset('frontend/assets/js/main.js?v=5.3')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/shop.js?v=5.3')); ?>"></script>

    <script src="<?php echo e(asset('frontend/assets/js/shop.js?v=5.3')); ?>"></script>


<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function productView(id) {
    $.ajax({
        type: 'GET',
        url: '/product/view/model/' + id,
        dataType: 'json',
        success: function(data) {
            console.log(data);

            // Atualizar detalhes do produto
            $('#pname').text(data.product.product_name);
            $('#pprice').text(data.product.discount_price + ' MZN');
            $('#oldprice').text(data.product.selling_price + ' MZN');
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name);
            $('#pbrand').text(data.product.brand.brand_name);
            $('#product_id').val(id);
            $('#qty').val(1);

            // Atualizar imagem
            $('#pimage').attr('src', data.image);
            $('#pimage').attr('alt', data.product.product_name);
            $('#pimage').css('max-width', '100%');

            // Preço com desconto
            if (data.product.discount_price == null) {
                $('#pprice').hide();
                $('#oldprice').text(data.product.selling_price);
            } else {
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            }

            // Disponibilidade
            if (data.product.product_qty > 0) {
                $('#aviable').text('Disponível');
                $('#stockout').text('');
            } else {
                $('#aviable').text('');
                $('#stockout').text('Fora de Estoque');
            }

            // Preencher tamanhos
            $('select[name="size"]').empty();
            if (data.size && data.size.length > 0) {
                $('#sizeArea').show();
                $.each(data.size, function(key, value) {
                    $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
                });
            } else {
                $('#sizeArea').hide();
            }

            // Preencher cores
            $('select[name="color"]').empty();
            if (data.color && data.color.length > 0) {
                $('#colorArea').show();
                $.each(data.color, function(key, value) {
                    $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                });
            } else {
                $('#colorArea').hide();
            }

            // Exibir modal
            $('#quickViewModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Erro ao carregar os detalhes do produto:', error);
            alert('Não foi possível carregar os detalhes do produto. Tente novamente mais tarde.');
        }
    });
}






    //Adicionar no Cart
    function addToCart(){

        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color= $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type:"POST",
            dataType : 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url:"/cart/data/store/"+id,
            success:function(data){
                $('#closeModal').click();
                console.log(data)
            }
        })
    }

</script>
<script type="text/javascript">
function miniCart(){
    $.ajax({
        type: 'GET',
        url: '/product/mini/cart',
        datatype: 'json'
        success: function(response){
            console.log(response)
        }
    })
}

</script>
<div id="loading">Loading&#8330;</div>
</body>

</html><?php /**PATH C:\Users\Cuata\Desktop\ALY\starshop\resources\views/frontend/master_dashboard.blade.php ENDPATH**/ ?>