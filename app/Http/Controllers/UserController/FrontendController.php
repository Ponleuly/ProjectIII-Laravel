<?php

namespace App\Http\Controllers\UserController;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.mainPages.home');
    }

    public function thankyou()
    {
        return view('frontend.mainPages.thankyou');
    }
    public function like()
    {
        return view('frontend.mainPages.like');
    }
    public function profile()
    {
        return view('frontend.mainPages.profile');
    }
}
