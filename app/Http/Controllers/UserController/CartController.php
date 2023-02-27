<?php

namespace App\Http\Controllers\UserController;

use App\Models\Carts;
use App\Models\Sizes;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            $carts = Carts::where('user_id', Auth::user()->id)->get();
            $carts_count = $carts->count();
        } else {
            $carts = Cart::content();
            $carts_count = $carts->count();
        }
        return view(
            'frontend.mainPages.cart',
            compact(
                'carts',
                'carts_count'
            )
        );
        //return dd($carts->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request, $id)
    {
        //========== If User Sign in then save to Carts table============== //
        if (Auth::check() && Auth::user()->role == 1) {
            $user_id = Auth::user()->id;
            //==== update quantity if add the same size, prudct and user incart ===//
            $update_qty = Carts::where('user_id', $user_id)
                ->where('product_id', $id)
                ->where('size_id', $request->size_id)
                ->first();
            if ($update_qty) {
                $update_qty->product_quantity += $request->product_quantity;
                $update_qty->update();
            } else {
                $input = $request->all();
                $input['user_id'] = $user_id;
                $input['product_id'] = $id;
                $input['size_id'] = $request->size_id;
                $input['product_quantity'] = $request->product_quantity;
                Carts::create($input);
            }
        }
        //========== If User is guest then save data to Cart (Cart is a model from package) ==============//
        else {
            $products = Products::findOrFail($id);
            Cart::add(
                [
                    'id' => $products->id,
                    'name' => $products->product_name,
                    'price' => $products->product_saleprice,
                    'qty' => $request->product_quantity,
                    'weight' => 0,
                    'options' => [
                        'image' => $products->product_imgcover,
                        'size' => $request->size_id
                    ],
                ]
            );
        }
        //=============== Check if Add to cart or Buy now =================//
        if ($request->action == 'addtocart') {
            return redirect()->back()
                ->with(
                    'message',
                    'Product is added to cart successfully!',
                );
        } else if ($request->action == 'buynow') {
            return redirect('/cart');
        }
        //return dd($request->toArray());
    }

    public function update_cart(Request $request, $cartId)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            //$user_id = Auth::user()->id;
            //==== update quantity if add the same size, prudct and user incart ===//
            $update_cart = Carts::where('id', $cartId)->first();
            $update_cart->size_id = $request->size_id;
            $update_cart->product_quantity = $request->product_quantity;
            $update_cart->update();
        } else {
            $products = Products::findOrFail($cartId);
            $cart = Cart::content()->where('id', $cartId);
            foreach ($cart as $key => $value) {
                $rowId = $value->rowId;
            }
            Cart::update(
                $rowId,
                [
                    'qty' => $request->product_quantity,
                    'options' => [
                        'image' => $products->product_imgcover,
                        'size' => $request->size_id
                    ],
                ]
            );
        }
        return redirect()->back()
            ->with(
                'message',
                'Item is updated successfully!',
            );

        //return dd(Cart::content());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $carts = Cart::content();

        return view(
            'frontend.mainPages.checkout',
            compact('carts')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove_from_cart($id)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            $removeCart = Carts::where('id', $id)->first();
            $removeCart->delete();
        } else {
            $cart = Cart::content()->where('id', $id);
            foreach ($cart as $key => $value) {
                $rowId = $value->rowId;
            }
            Cart::remove($rowId);
        }
        return redirect()->back()
            ->with(
                'message',
                'Product is removed from cart successfully!',
            );
        //return dd($rowId);
    }
    public function remove_all_cart()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            Carts::where('user_id', Auth::user()->id)->delete();
        } else {
            Cart::destroy();
        }
        return redirect()->back()
            ->with(
                'message',
                'All products is removed from cart successfully!',
            );
        //return dd($rowId);
    }
}
