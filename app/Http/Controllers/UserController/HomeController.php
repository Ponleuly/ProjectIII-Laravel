<?php

namespace App\Http\Controllers\UserController;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $newProducts = Products::where('product_status', 1)->paginate(6);
        return view(
            'frontend.mainPages.home',
            compact('newProducts')
        );
    }
}
