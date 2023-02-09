<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\FrontendController;
use App\Http\Controllers\UserController\ProductController;

use App\Http\Controllers\AdminController\AdminFrontendController;
use App\Http\Controllers\AdminController\ProductCategoryController;
use App\Http\Controllers\AdminController\ProductgroupController;




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
   Route::get('/shop', 'shop')->name('shop');
   Route::get('/cart', 'cart')->name('cart');
   Route::get('/checkout', 'checkout')->name('checkout');
   Route::get('/thankyou', 'thankyou')->name('thankyou');
   Route::get('/like', 'like')->name('like');
   Route::get('/profile', 'profile')->name('profile');
});
Route::controller(ProductController::class)->group(function () {
   Route::get('/product-men', 'product_men')->name('product-men');
   Route::get('/product-detail', 'product_detail')->name('product-detail');
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
   Route::get('/product-category-add', 'product_category_add')->name('product-category-add');
   Route::post('/product-category-add', 'product_category_store')->name('product-category-add');
   Route::get('/product-category-edit/{id}', 'product_category_edit')->name('product-category-edit');
   Route::put('/product-category-edit/{id}', 'product_category_update');
});
