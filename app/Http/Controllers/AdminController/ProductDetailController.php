<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Product_groups;
use App\Models\Product_sizes;
use App\Models\Product_categories;
use App\Models\Product_colors;
use App\Models\Product_details;
use App\Models\Product_images;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_detail_add()
    {
        $product_sizes = Product_sizes::orderBy('size')->get();
        $product_colors = Product_colors::orderBy('id')->get();
        $product_groups = Product_groups::orderBy('id')->get();
        $product_categories = Product_categories::orderBy('id')->get();

        return view(
            'adminfrontend.pages.products.product_detail_add',
            compact(
                'product_sizes',
                'product_colors',
                'product_groups',
                'product_categories'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_detail_list()
    {
        $products = Product_details::latest()->get();
        $count = 1;
        return view(
            'adminfrontend.pages.products.product_detail_list',
            compact(
                'products',
                'count'
            )

        );
    }
    public function product_detail_view($id)
    {
        $product_view = Product_details::where('id', $id)->first();
        //$color = $product_view->color_id;

        return view(
            'adminfrontend.pages.products.product_detail_view',
            compact(
                'product_view',
            )

        );


        //return dd(json_decode($color));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function product_detail_store(Request $request)
    {
        $input  = $request->all();

        $input['product_color'] = collect($request->color);
        $input['product_size'] = collect($request->size);

        if ($request->hasFile('product_imgcover')) {
            $destination_path = 'product_img/imgcover';
            $image = $request->file('product_imgcover');

            $image_name = $image->getClientOriginalName();
            $image->move($destination_path, $image_name);

            $input['product_imgcover'] = $image_name;
        }
        Product_details::create($input);

        $product = Product_details::where('product_name', $request->product_name)->latest()->first();
        $productId = $product->id;
        //$imgCount = count($request->product_imgreview);
        if ($file = $request->hasFile('product_imgreview')) {
            $file = $request->file('product_imgreview');
            $destinationPath = 'product_img/imgreview';

            if (is_array($file)) {
                foreach ($file as $part) {
                    $filename = $part->getClientOriginalName();
                    $part->move($destinationPath, $filename);

                    $input['product_imgreview'] = $filename;
                    $input['product_id'] = $productId;
                    Product_images::create($input);
                }
            }
        }

        return redirect('/admin/product-detail-add')
            ->with('alert', 'Product ' . $request->product_name . ' is added successfully!');
        //return dd($request->color_id);
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
    public function destroy($id)
    {
        //
    }
}
