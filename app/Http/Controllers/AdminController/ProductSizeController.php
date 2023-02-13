<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_sizes;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_size_list()
    {
        $product_sizes = Product_sizes::orderBy('size')->get();
        $count = 1;
        return view(
            '
                adminfrontend.pages.sizes.product_size_list',
            compact(
                'product_sizes',
                'count'
            )
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function product_size_add()
    {
        return view('adminfrontend.pages.sizes.product_size_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_size_store(Request $request)
    {
        $input = $request->all();
        Product_sizes::create($input);
        return redirect('/admin/product-size-add')
            ->with('alert', 'Product size ' . $request->size . ' is added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_size_edit($id)
    {
        $sizes = Product_sizes::where('id', $id)->first();

        return view(
            'adminfrontend.pages.sizes.product_size_edit',
            compact('sizes')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_size_update(Request $request, $id)
    {
        $update_size = Product_sizes::where('id', $id)->first();
        $update_size->size = $request->input('size');
        $update_size->update();

        return redirect('/admin/product-size-list')
            ->with(
                'alert',
                'Product size ' . '"' . $update_size->size . '"' .
                    ' is updated successfully !'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_size_delete($id)
    {
        $delete_size = Product_sizes::where('id', $id)->first();
        $delete_size->delete();

        return redirect('/admin/product-size-list')
            ->with(
                'alert',
                'Product size ' . '"' . $delete_size->size . '"' .
                    ' is deleted successfully !'
            );
    }
}
