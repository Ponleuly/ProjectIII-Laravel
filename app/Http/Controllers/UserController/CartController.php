<?php

namespace App\Http\Controllers\UserController;

use App\Models\User;
use App\Models\Carts;
use App\Models\Sizes;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Deliveries;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Models\Orders_Details;
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
                    'weight' => 0, //defualt column in Cart
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
        if (Auth::check() && Auth::user()->role == 1) {
            $carts = Carts::where('user_id', Auth::user()->id)->get();
        } else {
            $carts = Cart::content();
        }
        $deliveries = Deliveries::orderBy('id')->get();

        return view(
            'frontend.mainPages.checkout',
            compact(
                'carts',
                'deliveries'
            )
        );
    }

    public function place_order(Request $request)
    {
        $input = $request->all();
        //==== Store data to table customer =====//
        Customers::create($input);

        if (Auth::check() && Auth::user()->role == 1) {
            // Get customer id
            $customer = Customers::latest()->first();
            $customerId = $customer->id;
            // Store data to table orders
            Orders::create([
                'customer_id' => $customerId,
                'user_id' => Auth::user()->id,
            ]);
            // Get order id
            $order = Orders::latest()->first();
            $orderId = $order->id;
            // Get data from Carts model
            $carts = Carts::where('user_id', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                // Store data to table orderDetails
                Orders_Details::create([
                    'order_id' => $orderId,
                    'product_id' => $cart->product_id,
                    'product_price' => $cart->rela_product_cart->product_saleprice,
                    'product_quantity' => $cart->product_quantity,
                    'size_id' => $cart->size_id,
                    'payment' => $request->payment,
                    'delivery_fee' => $request->delivery_fee,
                ]);
            }
            // Remove all products in carts after user completed order
            Carts::where('user_id', Auth::user()->id)->delete();
        } else {
            // Get customer id
            $customer = Customers::latest()->first();
            $customerId = $customer->id;
            // Store data to table orders
            Orders::create([
                'customer_id' => $customerId,
                'user_id' => 0,
            ]);
            // Get order id
            $order = Orders::latest()->first();
            $orderId = $order->id;
            // Get data from Cart if customer not signin

            $carts = Cart::content();
            foreach ($carts as $cart) {
                // Store data to table orderDetails
                Orders_Details::create([
                    'order_id' => $orderId,
                    'product_id' => $cart->id,
                    'product_price' => $cart->price,
                    'product_quantity' => $cart->qty,
                    'size_id' => $cart->options->size,
                    'payment' => $request->payment,
                    'delivery_fee' => $request->delivery_fee,
                ]);
            }
            // Remove all products in Cart after user completed order
            Cart::destroy();
        }
        return redirect('thankyou');
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
