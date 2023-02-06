<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\FrontendController;
use App\Http\Controllers\UserController\ProductController;


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
Route::get('/index', function(){
   return view('index'); 
});
/*============= Frontend route ==================*/
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
Route::controller(ProductController::class)->group(function(){
   Route::get('/product-men', 'product_men')->name('product-men');
   Route::get('/product-detail', 'product_detail')->name('product-detail');

});





