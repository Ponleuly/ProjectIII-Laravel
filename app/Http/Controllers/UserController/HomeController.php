<?php

namespace App\Http\Controllers\UserController;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $newProducts = Products::where('product_status', 1)->paginate(6);
        $categories = Categories::orderBy('id')->get();
        $newProduct_count = $newProducts->count();
        return view(
            'frontend.mainPages.home',
            compact(
                'newProducts',
                'categories',
                'newProduct_count'
            )
        );
    }
}
