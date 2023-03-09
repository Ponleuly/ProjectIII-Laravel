<?php

namespace App\Http\Controllers\UserController;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Subscribers;

class HomeController extends Controller
{
    public function home()
    {
        $newProducts = Products::where('product_status', 1)->paginate(6);
        $categories = Categories::orderBy('id')->get();
        $news = News::orderBy('id')->get();
        $newProduct_count = $newProducts->count();
        return view(
            'frontend.mainPages.home',
            compact(
                'newProducts',
                'categories',
                'newProduct_count',
                'news'
            )
        );
    }

    public function subscriber_store(Request $request)
    {
        $input  = $request->all();
        Subscribers::create($input);
        return redirect()->back()
            ->with('message', 'You are subscribered successfully !');
    }
}
