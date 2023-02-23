<?php

namespace App\Http\Controllers\UserController;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.mainPages.home');
    }

    public function cart()
    {
        return view('frontend.mainPages.cart');
    }
    public function add_to_cart($id)
    {
        $products = Products::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_name' => $products->product_name,
                'product_imgcover' => $products->product_imgcover,
                'product_saleprice' => $products->product_saleprice,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()
            ->with('alert', 'Product is added to cart successfully!');
        //return dd($products);
    }
    public function checkout()
    {
        return view('frontend.mainPages.checkout');
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
