<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController\CartController;
use App\Http\Controllers\UserController\LikeController;
use App\Http\Controllers\UserController\ProductController;
use App\Http\Controllers\UserController\ProfileController;
use App\Http\Controllers\UserController\AuthUserController;
use App\Http\Controllers\UserController\FrontendController;
use App\Http\Controllers\AdminController\DeliveryController;
use App\Http\Controllers\AdminController\AuthAdminController;
use App\Http\Controllers\AdminController\ProductSizeController;
use App\Http\Controllers\AdminController\ProductColorController;
use App\Http\Controllers\AdminController\ProductgroupController;
use App\Http\Controllers\AdminController\AdminFrontendController;
use App\Http\Controllers\AdminController\ProductDetailController;
use App\Http\Controllers\AdminController\ProductCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('frontend.mainPages.home');
});
Route::get('/index', function () {
   return view('index');
});
/*============= User Frontend route ==================*/
// *Using Route group to control route pages

Route::controller(AuthUserController::class)->group(function () {
   Route::get('login', 'userLogin')->name('login');
   Route::post('login', 'login')->name('login');
   Route::get('logout', 'userLogout')->name('logout')->middleware('authUser');

   Route::get('register', 'register')->name('register');
   Route::post('register', 'userRegister')->name('register');
});
//============== Profile Route with Middleware =====================//
Route::middleware('authUser')->group(function () {
   Route::controller(ProfileController::class)->group(function () {
      Route::get('profile', 'profile')->name('profile');
      Route::put('profile-update/{id}', 'profile_update')->name('profile-update');
      Route::get('change-password', 'change_password')->name('change-password');
      Route::put('change-password/{id}', 'update_password')->name('change-password');
   });
});
//==============Like Route with Middleware =====================//

Route::controller(LikeController::class)->group(function () {
   Route::get('like', 'like')->name('like')->middleware('authUser');
   Route::get('add-like/{product_id}/{user_id}', 'add_like')->name('add-like');
   Route::get('remove-like/{id}', 'remove_like')->name('remove-like');
   Route::get('remove-all-like', 'remove_all_like')->name('remove-all-like');
});
Route::controller(FrontendController::class)->group(function () {
   Route::get('/home', 'home')->name('home');
   Route::get('thankyou', 'thankyou')->name('thankyou');
});
Route::controller(ProductController::class)->group(function () {
   Route::get('shop', 'shop')->name('shop');
   Route::get('product-{group}', 'product')->name('product-{group}');
   Route::get('product-detail/{code}', 'product_detail')->name('product-detail');
   Route::get('product-category/{group}/{category}', 'product_category')->name('product-category');
   Route::get('product-subcategory/{group}/{category}/{subcategory}', 'product_subcategory')->name('product-subcategory');
});
Route::controller(CartController::class)->group(function () {
   Route::get('cart', 'cart')->name('cart');
   Route::post('add-to-cart/{id}', 'add_to_cart')->name('add-to-cart');
   Route::put('update-cart/{id}', 'update_cart')->name('update-cart');
   Route::get('remove-from-cart/{id}', 'remove_from_cart')->name('remove-from-cart');
   Route::get('remove-all-cart', 'remove_all_cart')->name('remove-all-cart');
   Route::get('checkout', 'checkout')->name('checkout');
   Route::post('place-order', 'place_order')->name('place-order');
});
/*============= End User Frontend route ==================*/




/*================================================== Admin Frontend route =========================================================*/

Route::controller(AuthAdminController::class)->group(function () {
   Route::get('admin', 'adminLogin')->name('admin');
   Route::post('admin/login', 'login')->name('login');
   Route::get('admin/logout', 'adminLogout')->name('logout');;
});

Route::prefix('admin')->controller(AdminFrontendController::class)->group(function () {
   Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('authAdmin');
});

Route::prefix('admin')->middleware('authAdmin')->group(function () {
   Route::controller(ProductGroupController::class)->group(function () {
      Route::get('/product-group-list', 'product_group_list')->name('product-group-list');
      Route::get('/product-group-add', 'product_group_add')->name('product-group-add');
      Route::post('/product-group-add', 'product_group_store')->name('product-group-add');
      Route::get('/product-group-edit/{id}', 'product_group_edit')->name('product-group-edit');
      Route::put('/product-group-edit/{id}', 'product_group_update');
      Route::get('/product-group-delete/{id}', 'product_group_delete');
   });
});

Route::prefix('admin')->middleware('authAdmin')->group(function () {
   Route::controller(ProductCategoryController::class)->group(function () {
      Route::get('/product-category-list', 'product_category_list')->name('product-category-list');
      Route::get('/product-category-view/{id}', 'product_category_view')->name('product-category-view');
      Route::get('/product-category-add', 'product_category_add')->name('product-category-add');
      Route::post('/product-category-add', 'product_category_store')->name('product-category-add');
      Route::get('/product-category-edit/{id}', 'product_category_edit')->name('product-category-edit');
      Route::put('/product-category-edit/{id}', 'product_category_update');
      Route::get('/product-category-delete/{id}', 'product_category_delete');
   });
});
Route::prefix('admin')->middleware('authAdmin')->group(function () {
   Route::controller(ProductSizeController::class)->group(function () {
      Route::get('/product-size-list', 'product_size_list')->name('product-size-list');
      Route::get('/product-size-add', 'product_size_add')->name('product-size-add');
      Route::post('/product-size-add', 'product_size_store')->name('product-size-add');
      Route::get('/product-size-edit/{id}', 'product_size_edit')->name('product-size-edit');
      Route::put('/product-size-edit/{id}', 'product_size_update');
      Route::get('/product-size-delete/{id}', 'product_size_delete');
   });
});
Route::prefix('admin')->middleware('authAdmin')->group(function () {
   Route::controller(ProductDetailController::class)->group(function () {
      Route::get('/product-detail-list', 'product_detail_list')->name('product-detail-list');
      Route::get('/product-detail-view/{code}', 'product_detail_view')->name('product-detail-view');
      Route::get('/product-detail-add', 'product_detail_add')->name('product-detail-add');
      Route::post('/product-detail-add', 'product_detail_store')->name('product-detail-add');
      Route::get('/product-detail-edit/{id}', 'product_detail_edit')->name('product-detail-edit');
      Route::put('/product-detail-edit/{id}', 'product_detail_update');
      Route::get('/product-detail-delete/{id}', 'product_detail_delete');
   });
});
Route::prefix('admin')->middleware('authAdmin')->group(function () {
   Route::controller(DeliveryController::class)->group(function () {
      Route::get('/delivery-list', 'delivery_list')->name('delivery-list');
      Route::get('/delivery-add', 'delivery_add')->name('delivery-add');
      Route::post('/delivery-add', 'delivery_store')->name('delivery-add');
      Route::get('/delivery-edit/{id}', 'delivery_edit')->name('delivery-edit');
      Route::put('/delivery-edit/{id}', 'delivery_update');
      Route::get('/delivery-delete/{id}', 'delivery_delete');
   });
});
/*
Auth::routes();

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->controller(AdminFrontendController::class)->group(function () {
   Route::get('/dashboard', 'dashboard')->name('admin.dashboard')->middleware('auth:admin');
});
*/
/*
Route::get('/admin/dashboard', function () {
   return view('admin');
})->middleware('auth:admin');
*/