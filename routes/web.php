<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\FrontendController;
use App\Http\Controllers\UserController\ProductController;

use App\Http\Controllers\AdminController\AdminFrontendController;
use App\Http\Controllers\AdminController\ProductCategoryController;
use App\Http\Controllers\AdminController\ProductgroupController;
use App\Http\Controllers\AdminController\ProductDetailController;
use App\Http\Controllers\AdminController\ProductSizeController;
use App\Http\Controllers\AdminController\ProductColorController;






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
   return view('welcome');
});
Route::get('/index', function () {
   return view('index');
});
/*============= User Frontend route ==================*/
// *Using Route group to control route pages
Route::controller(FrontendController::class)->group(function () {
   Route::get('/home', 'home')->name('home');
   Route::get('/cart', 'cart')->name('cart');
   Route::get('/checkout', 'checkout')->name('checkout');
   Route::get('/thankyou', 'thankyou')->name('thankyou');
   Route::get('/like', 'like')->name('like');
   Route::get('/profile', 'profile')->name('profile');
});
Route::controller(ProductController::class)->group(function () {
   Route::get('shop', 'shop')->name('shop');
   Route::get('product-{group}', 'product')->name('product-{group}');
   Route::get('product-detail/{code}', 'product_detail')->name('product-detail');
   Route::get('product-category/{group}/{category}', 'product_category')->name('product-category');
});
/*============= End User Frontend route ==================*/

/*============= Admin Frontend route ==================*/
Route::prefix('admin')->controller(AdminFrontendController::class)->group(function () {
   Route::get('/dashboard', 'dashboard')->name('dashboard');
   Route::get('/product-add', 'product_add')->name('product-add');
});
Route::prefix('admin')->controller(ProductGroupController::class)->group(function () {
   Route::get('/product-group-list', 'product_group_list')->name('product-group-list');
   Route::get('/product-group-add', 'product_group_add')->name('product-group-add');
   Route::post('/product-group-add', 'product_group_store')->name('product-group-add');
   Route::get('/product-group-edit/{id}', 'product_group_edit')->name('product-group-edit');
   Route::put('/product-group-edit/{id}', 'product_group_update');
   Route::get('/product-group-delete/{id}', 'product_group_delete');
});
Route::prefix('admin')->controller(ProductCategoryController::class)->group(function () {
   Route::get('/product-category-list', 'product_category_list')->name('product-category-list');
   Route::get('/product-category-view/{id}', 'product_category_view')->name('product-category-view');
   Route::get('/product-category-add', 'product_category_add')->name('product-category-add');
   Route::post('/product-category-add', 'product_category_store')->name('product-category-add');
   Route::get('/product-category-edit/{id}', 'product_category_edit')->name('product-category-edit');
   Route::put('/product-category-edit/{id}', 'product_category_update');
   Route::get('/product-category-delete/{id}', 'product_category_delete');
});
Route::prefix('admin')->controller(ProductSizeController::class)->group(function () {
   Route::get('/product-size-list', 'product_size_list')->name('product-size-list');
   Route::get('/product-size-add', 'product_size_add')->name('product-size-add');
   Route::post('/product-size-add', 'product_size_store')->name('product-size-add');
   Route::get('/product-size-edit/{id}', 'product_size_edit')->name('product-size-edit');
   Route::put('/product-size-edit/{id}', 'product_size_update');
   Route::get('/product-size-delete/{id}', 'product_size_delete');
});

Route::prefix('admin')->controller(ProductDetailController::class)->group(function () {
   Route::get('/product-detail-list', 'product_detail_list')->name('product-detail-list');
   Route::get('/product-detail-view/{code}', 'product_detail_view')->name('product-detail-view');
   Route::get('/product-detail-add', 'product_detail_add')->name('product-detail-add');
   Route::post('/product-detail-add', 'product_detail_store')->name('product-detail-add');
   Route::get('/product-detail-edit/{id}', 'product_detail_edit')->name('product-detail-edit');
   Route::put('/product-detail-edit/{id}', 'product_detail_update');
   Route::get('/product-detail-delete/{id}', 'product_detail_delete');
});
