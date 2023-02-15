<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function product_color_list()
    {
        $colors = Colors::latest()->get();
        $count = 1;
        return view(
            'adminfrontend.pages.colors.product_color_list',
            compact(
                'colors',
                'count'
            )
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function product_color_add()
    {
        return view('adminfrontend.pages.colors.product_color_add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_color_store(Request $request)
    {
        $input = $request->all();
        Colors::create($input);
        return redirect('/admin/product-color-add')
            ->with('alert', 'Product color is added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_color_edit($id)
    {
        $color = Colors::where('id', $id)->first();

        return view(
            'adminfrontend.pages.colors.product_color_edit',
            compact(
                'color'
            )
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_color_update(Request $request, $id)
    {
        $update_color_name = Colors::where('id', $id)->first();
        $update_color_name->color_name = $request->input('color_name');
        $update_color_name->update();

        return redirect('/admin/product-color-list')
            ->with(
                'alert',
                'Product color is updated successfully!'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_color_delete($id)
    {
        $delete_color = Colors::where('id', $id)->first();
        $delete_color->delete();

        return redirect('/admin/product-color-list')
            ->with(
                'alert',
                'Product color is deleted successfully!'
            );
    }
}
