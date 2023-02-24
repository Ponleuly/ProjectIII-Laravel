<?php

namespace App\Http\Controllers\UserController;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $carts = Cart::content();

        return view(
            'frontend.mainPages.cart',
            compact('carts')
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
        /*
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'product_name' => $products->product_name,
                    'product_imgcover' => $products->product_imgcover,
                    'product_saleprice' => $products->product_saleprice,
                    'product_size' => $request->size_id,
                    'quantity' => $request->product_quantity,
                ];
            }
            session()->put('cart', $cart);
        */
        if ($request->action == 'addtocart') {
            return redirect()->back()
                ->with(
                    'alert',
                    'Product is added to cart successfully!',
                );
        } else if ($request->action == 'buynow') {
            return redirect('/cart');
        }

        //return dd($request->action);
    }
    public function update_cart(Request $request, $id)
    {
        $products = Products::findOrFail($id);
        $cart = Cart::content()->where('id', $id);
        foreach ($cart as $key => $value) {
            $rowId = $value->rowId;
        }

        Cart::update(
            $rowId,
            [
                'qty' => $request->quantity,
                'options' => [
                    'image' => $products->product_imgcover,
                    'size' => $request->size_id
                ],
            ]
        );

        return redirect()->back()
            ->with(
                'alert',
                'Item is updated successfully!',
            );

        //$Carts = Cart::content();
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
        $cart = Cart::content()->where('id', $id);
        foreach ($cart as $key => $value) {
            $rowId = $value->rowId;
        }

        Cart::remove($rowId);
        return redirect()->back()
            ->with(
                'alert',
                'Product is removed from cart successfully!',
            );
        //return dd($rowId);
    }
    public function remove_all_cart()
    {
        Cart::destroy();
        return redirect()->back()
            ->with(
                'alert',
                'All products is removed from cart successfully!',
            );
        //return dd($rowId);
    }
}
