<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', function(){
   return view('frontend.mainPages.home'); 
});
Route::get('/shop', function(){
   return view('frontend.mainPages.shop'); 
});
Route::get('/men', function(){
   return view('frontend.product.product_men'); 
});
Route::get('/women', function(){
   return view('product_men'); 
});
Route::get('/product-detail', function(){
   return view('frontend.product.product_detail'); 
});
Route::get('/cart', function(){
   return view('frontend.mainPages.cart'); 
});
Route::get('/checkout', function(){
   return view('frontend.mainPages.checkout'); 
});
Route::get('/thankyou', function(){
   return view('frontend.mainPages.thankyou'); 
});
Route::get('/like', function(){
   return view('frontend.mainPages.like'); 
});
Route::get('/profile', function(){
   return view('frontend.mainPages.profile'); 
});