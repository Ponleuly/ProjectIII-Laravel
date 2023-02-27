<?php

namespace App\Http\Controllers\UserController;

use App\Models\Likes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like()
    {
        $likes = Likes::Where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view(
            'frontend.mainPages.like',
            compact('likes')
        );
    }
    public function add_like($product_id, $user_id)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            $add_like = Likes::where('product_id', $product_id)->where('user_id', $user_id)->first();
            if ($add_like) {
                $add_like->delete();
            } else {
                $add_like['product_id'] = $product_id;
                $add_like['user_id'] = $user_id;
                Likes::create($add_like);
                return redirect()->back()->with(
                    'alert',
                    'Products is added to liked successfully!',
                );
            }
            return redirect()->back()->with(
                'alert',
                'Products is removed from liked !',
            );
        } else {
            return redirect()->back()->with(
                'alert',
                'Please sign in ! To add products to liked.',
            );
        }
    }
}
