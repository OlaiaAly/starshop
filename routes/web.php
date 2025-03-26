<?php 

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PromoterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TicketController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCroller;
use App\Http\Middleware\RedirectIfAuthenticated;


// Carrega as rotas de autenticação
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aqui você pode registrar as rotas da aplicação. Todas as rotas 
| estão carregadas pelo RouteServiceProvider e serão atribuídas ao 
| grupo "web" middleware.
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [IndexController::Class, 'Index']);

/*
|--------------------------------------------------------------------------
| Rotas do Usuário
|--------------------------------------------------------------------------
| Rotas acessíveis para todos os usuários autenticados.
*/
Route::middleware('auth')->group(function () {
    // Dashboard do usuário
    Route::get('/dashboard', [UserController::Class, 'UserDashboard'])->name('dashboard');

    // Perfil do usuário
    Route::post('/user/profile/store', [UserController::Class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::Class, 'UserLogout'])->name('user.logout');

    // Configurações de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});


/*
|--------------------------------------------------------------------------
| Rotas do Admin
|--------------------------------------------------------------------------
| Grupo de rotas para administradores, protegidas pelo middleware de 
| autenticação e de verificação de função (admin).
*/
Route::middleware(['auth', 'role:admin'])->group(function() {
    // Dashboard do administrador
    Route::get('/admin/dashboard', [AdminController::Class, 'AdminDashboard'])->name('admin.dashboard');

    // Perfil do administrador
    Route::get('/admin/logout', [AdminController::Class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::Class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::Class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::Class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::Class, 'AdminUpdatePassword'])->name('update.password');
});

/*
|--------------------------------------------------------------------------
| Rotas do Promoter
|--------------------------------------------------------------------------
| Grupo de rotas para administradores, protegidas pelo middleware de 
| autenticação e de verificação de função (promoter).
*/

Route::middleware(['auth', 'role:promoter'])->group(function() {
    // Dashboard do promotor
    Route::get('/promoter/dashboard', [PromoterController::class, 'PromoterDashboard'])->name('promoter.dashboard');

    // Perfil do promotor
    Route::get('/promoter/logout', [PromoterController::class, 'PromoterDestroy'])->name('promoter.logout');
    Route::get('/promoter/profile', [PromoterController::class, 'PromoterProfile'])->name('promoter.profile');
    Route::post('/promoter/profile/store', [PromoterController::class, 'PromoterProfileStore'])->name('promoter.profile.store');
    Route::get('/promoter/change/password', [PromoterController::class, 'PromoterChangePassword'])->name('promoter.change.password');
    Route::post('/promoter/update/password', [PromoterController::class, 'PromoterUpdatePassword'])->name('promoter.update.password');

    Route::controller(PromoterTicketController::class)->group(function() {
        Route::get('/promoter/all/ticket', 'PromoterAllTicket')->name('promoter.all.ticket');
        Route::get('/promoter/add/ticket', 'PromoterAddTicket')->name('promoter.add.ticket');
        Route::get('/promoter/subcategory/ajax/{category_id}', 'PromoterGetSubCategory');
        Route::post('/promoter/store/ticket', 'PromoterStoreTicket')->name('promoter.store.ticket');
        Route::get('promoter/edit/ticket/{id}', 'PromoterEditTicket')->name('promoter.edit.ticket');
        Route::post('promoter/update/ticket', 'PromoterUpdateTicket')->name('promoter.update.ticket');
        Route::post('promoter/update/ticket/thumbnail', 'PromoterUpdateTicketThumbnail')->name('promoter.update.ticket.thumbnail');
        Route::get('promoter/ticket/inactive/{id}', 'PromoterTicketInactive')->name('promoter.ticket.inactive');
        Route::get('promoter/ticket/active/{id}', 'PromoterTicketActive')->name('promoter.ticket.active');
    });
    

});


/*
|--------------------------------------------------------------------------
| Rotas do Vendedor
|--------------------------------------------------------------------------
| Grupo de rotas para vendedores, protegidas pelo middleware de autenticação
| e de verificação de função (vendor).
*/
Route::middleware(['auth', 'role:vendor'])->group(function() {
    // Dashboard do vendedor
    Route::get('/vendor/dashboard', [VendorController::Class, 'VendorDashboard'])->name('vendor.dashboard');

    // Perfil do vendedor
    Route::get('/vendor/logout', [VendorController::Class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::Class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::Class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::Class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::Class, 'VendorUpdatePassword'])->name('vendor.update.password');


    Route::controller(VendorProductController::class)->group(function() {
        Route::get('/vendor/all/Product', 'VendorAllProduct')->name('vendor.all.product');
        Route::get('/vendor/add/Product', 'VendorAddProduct')->name('vendor.add.product');
        Route::get('/vendor/subcategory/ajax/{category_id}', 'VendorGetSubCategory');
        Route::post('/vendor/store/product', 'VendorStoreProduct')->name('vendor.store.product');
        Route::get('vendor/edit/product/{id}', 'VendorEditProduct')->name('vendor.edit.product');
        Route::post('vendor/update/product', 'VendorUpdateProduct')->name('vendor.update.product');
        Route::post('Vendor/update/product/thambnail', 'VendorUpdateProductThambnail')->name('vendor.update.product.thambnail');
        Route::get('vendor/product/inactive/{id}', 'VendorProductInactive')->name('vendor.product.inactive');
        Route::get('vendor/product/active/{id}', 'VendorProductActive')->name('vendor.product.active');



        
    });

});

// Rotas de login de Admin e Vendor
Route::get('/admin/login', [AdminController::Class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
Route::get('/vendor/login', [VendorController::Class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/promoter/login', [PromoterController::Class, 'PromoterLogin'])->name('promoter.login');
Route::get('/became/promoter', [PromoterController::Class, 'BecomePromoter'])->name('become.promoter');
Route::get('/become/vendor', [VendorController::Class, 'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register', [VendorController::Class, 'VendorRegister'])->name('vendor.register');
Route::post('/promoter/register', [PromoterController::Class, 'PromoterRegister'])->name('promoter.register');


/*
|--------------------------------------------------------------------------
| Rotas de Administração de Marcas
|--------------------------------------------------------------------------
| Conjunto de rotas para gerenciar as marcas, acessível apenas para 
| administradores.
*/
Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::controller(BrandController::class)->group(function() {
        Route::get('all/brand', 'AllBrand')->name('all.brand');
        Route::get('add/brand', 'AddBrand')->name('add.brand');
        Route::post('store/brand', 'StoreBrand')->name('store.brand');
        Route::get('edit/brand{id}', 'EditBrand')->name('edit.brand');
        Route::post('update/brand{id}', 'UpdateBrand')->name('update.brand');
        Route::get('delete/brand{id}', 'DeleteBrand')->name('delete.brand');
    });

    /*
    |--------------------------------------------------------------------------
    | Rotas de Categorias e Subcategorias
    |--------------------------------------------------------------------------
    | Conjunto de rotas para gerenciar categorias e subcategorias de produtos.
    */
    Route::controller(CategoryController::class)->group(function() {
        Route::get('all/category', 'AllCategory')->name('all.category');
        Route::get('add/category', 'AddCategory')->name('add.category');
        Route::post('store/category', 'StoreCategory')->name('store.category');
        Route::get('edit/category{id}', 'EditCategory')->name('edit.category');
        Route::post('update/category', 'UpdateCategory')->name('update.category');
        Route::get('delete/category{id}', 'DeleteCategory')->name('delete.category');
    });

    Route::controller(SubCategoryController::class)->group(function() {
        Route::get('all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('edit/subcategory{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('update/subcategory', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('delete/subcategory{id}', 'DeleteSubCategory')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');
    });

    /*
    |--------------------------------------------------------------------------
    | Rotas de Gerenciamento de Vendedores
    |--------------------------------------------------------------------------
    | Gerenciar vendedores ativos e inativos, acessível apenas para admins.
    */
    Route::controller(AdminController::class)->group(function() {
        Route::get('inactive/vendor', 'InactiveVendor')->name('inactive.vendor');
        Route::get('active/vendor', 'ActiveVendor')->name('active.vendor');
        Route::get('inactive/vendor/details/{id}', 'InactiveVendorDetails')->name('inactive.vendor.details');
        Route::get('active/vendor/details/{id}', 'ActiveVendorDetails')->name('active.vendor.details');
        Route::post('active/vendor/approve', 'ActiveVendorApprove')->name('active.vendor.approve');
    });
    Route::post('inactive/vendor/approve', [AdminController::class, 'InactiveVendorApprove'])->name('inactive.vendor.approve');


    /*
    |--------------------------------------------------------------------------
    | Rotas de Gerenciamento de Produtos
    |--------------------------------------------------------------------------
    | Gerenciar produtos do sistema, acessível apenas para administradores.
    */
    Route::controller(ProductController::class)->group(function() {
        Route::get('all/product', 'AllProduct')->name('all.product');
        Route::get('add/product', 'AddProduct')->name('add.product');
        Route::post('store/product', 'StoreProduct')->name('store.product');
        Route::get('edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::get('delete/product{id}', 'DeleteProduct')->name('delete.product');
        Route::post('update/product', 'UpdateProduct')->name('update.product');
        Route::post('update/product/thambnail', 'UpdateProductThambnail')->name('update.product.thambnail');
        Route::get('product/inactive/{id}', 'ProductInactive')->name('product.inactive');
        Route::get('product/active/{id}', 'ProductActive')->name('product.active');



    });
    

    Route::controller(TicketController::class)->group(function() {
        Route::get('all/ticket', 'AllTicket')->name('all.ticket');
        Route::get('add/ticket', 'AddTicket')->name('add.ticket');
        Route::post('store/ticket', 'StoreTicket')->name('store.ticket');
        Route::get('edit/ticket/{id}', 'EditTicket')->name('edit.ticket');
        Route::get('delete/ticket{id}', 'DeleteTicket')->name('delete.ticket');
        Route::post('update/ticket', 'UpdateTicket')->name('update.ticket');
        Route::post('update/ticket/thambnail', 'UpdateTicketThambnail')->name('update.ticket.thambnail');
        Route::get('ticket/inactive/{id}', 'TicketInactive')->name('ticket.inactive');
        Route::get('ticket/active/{id}', 'TicketActive')->name('ticket.active');



    });

    Route::controller(SliderController::class)->group(function() {
        Route::get('all/slider', 'AllSlider')->name('all.slider');
        Route::get('add/slider', 'AddSlider')->name('add.slider');
        Route::post('store/slider', 'StoreSlider')->name('store.slider');
        Route::get('edit/slider{id}', 'EditSlider')->name('edit.slider');
        Route::post('update/slider', 'UpdateSlider')->name('update.slider');
        Route::get('delete/slider{id}', 'DeleteSlider')->name('delete.slider');
    });

    Route::controller(BannerController::class)->group(function() {
        Route::get('all/banner', 'AllBanner')->name('all.banner');
        Route::get('add/banner', 'AddBanner')->name('add.banner');
        Route::post('store/banner', 'StoreBanner')->name('store.banner');
        Route::get('edit/banner{id}', 'EditBanner')->name('edit.banner');
        Route::post('update/banner', 'UpdateBanner')->name('update.banner');
        Route::get('delete/banner{id}', 'DeleteBanner')->name('delete.banner');
    });
});




/**
 * User Profile Management Routes.
 * @author Aly Olaia
 */
Route::controller(IndexController::class)->group(function () {
    ///Frontend
    Route::get('ticket/details/{id}/{slug}', 'TicketDetails');
    Route::get('product/details/{id}/{slug}', 'ProductDetails')->name('product.details');
    Route::get('vendor/details/{id}','VendorDetails')->name('vendor.details');
    Route::get('vendor/all}', 'VendorAll')->name('vendor.all');
    Route::get('product/category/{id}/{slug}', 'CatWiseProduct');
    Route::get('product/subcategory/{id}/{slug}', 'SubCatWiseProduct');
    Route::get('/product/view/model/{id}/', 'ProductViewAjax');
    
    // Rota para exibir todos os tickets
    Route::get('/tickets', 'showAllTickets')->name('ticket.show.all');
    Route::get('/ticket/view/model/{id}/', 'TicketViewAjax');
    
});





/**
 * User Profile Management Routes.
 * @author Aly Olaia
 */
Route::controller(CartController::class)->middleware('auth')->group(function () {
    Route::post('/cart/data/store/{id}/', 'AddToCart')->name('addToCard');
    Route::get('/product/mini/cart', 'AddMiniCart')->name('xd');
    Route::get('list-cart-items', 'openCard')->name('openCard');
    Route::post('alter-cart-items', 'changeItems')->name('changeItems');
    Route::get('delete-card-items/{id}', 'deleteItem')->name('deleteItem');
    Route::get('/cart/clear/{id}', 'emptyCart')->name('clear-cart');
    Route::post('aply-coupon', 'applyCoupon')->name('applyCoupon');
});


Route::controller(PaymentCroller::class)->middleware('auth')->group(function () {
    Route::get('/checkout', 'index')->name('checkout');
    Route::post('/pay', 'pay')->name('pay');
});


Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::get('/orders', 'index')->name('get.orders');
    Route::get('/orders/pdf/{id}', 'openOrderPDF')->name('oders.pdf');
    // Route::post('/pay', 'pay')->name('pay');
});