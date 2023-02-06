<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.mainPages.home');
    }
    public function shop(){
        return view('frontend.mainPages.shop');
    }
    public function cart(){
        return view('frontend.mainPages.cart');
    }
    public function checkout(){
        return view('frontend.mainPages.checkout');
    }
     public function thankyou(){
        return view('frontend.mainPages.thankyou');
    }
    public function like(){
        return view('frontend.mainPages.like');
    }
    public function profile(){
        return view('frontend.mainPages.profile');
    }
}   
