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
   return view('home'); 
});
Route::get('/shop', function(){
   return view('shop'); 
});
Route::get('/about', function(){
   return view('about'); 
});
Route::get('/services', function(){
   return view('services'); 
});
Route::get('/blog', function(){
   return view('blog'); 
});
Route::get('/contact', function(){
   return view('contact'); 
});
Route::get('/profile', function(){
   return view('contact'); 
});
Route::get('/cart', function(){
   return view('cart'); 
});
Route::get('/checkout', function(){
   return view('checkout'); 
});
Route::get('/thankyou', function(){
   return view('thankyou'); 
});
