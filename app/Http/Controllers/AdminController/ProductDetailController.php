<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Sizes;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Products;
use App\Models\Products_Colors;
use App\Models\Products_Sizes;
use App\Models\Products_Imgreviews;
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
        $sizes = Sizes::orderBy('size_number')->get();
        $colors = Colors::orderBy('id')->get();
        $groups = Groups::orderBy('id')->get();
        $categories = Categories::orderBy('id')->get();

        return view(
            'adminfrontend.pages.products.product_detail_add',
            compact(
                'sizes',
                'colors',
                'groups',
                'categories'
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
        $products = Products::latest()->get();
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
        $product_view = Products::where('id', $id)->first();
        //$color = $product_view->color_id;
        $productColor = Products_Colors::where('product_id', $id)->get();
        $colorStock = 0;
        $productSize = Products_Sizes::where('product_id', $id)->get();
        $sizeStock = 0;
        foreach ($productColor as $row) {
            $colorStock += $row->color_quantity;
        }
        foreach ($productSize as $row) {
            $sizeStock += $row->size_quantity;
        }
        $totalStock = $colorStock + $sizeStock;

        return view(
            'adminfrontend.pages.products.product_detail_view',
            compact(
                'product_view',
                'totalStock'
            )

        );


        //return dd($totalStock);
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
        //========= Storing data for table products ======//
        if ($request->hasFile('product_imgcover')) {
            $destination_path = 'product_img/imgcover';
            $image = $request->file('product_imgcover');

            $image_name = $image->getClientOriginalName();
            $image->move($destination_path, $image_name);

            $input['product_imgcover'] = $image_name;
        }
        Products::create($input);
        //=======================================//

        //========= Storing data for table products_imgreviews ======//
        $product = Products::where('product_name', $request->product_name)->latest()->first();
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
                    Products_Imgreviews::create($input);
                }
            }
        }
        //=======================================//

        //========= Storing data for table products_colors ======//
        $product = Products::where('product_name', $request->product_name)->latest()->first();
        if ($request->color_id) {
            foreach ($request->color_id as $key => $colorId) {
                $product->rela_product_color()->create(
                    [
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                        'color_quantity' => $request->color_quantity[$key] ?? 0
                    ]
                );
            }
        }

        //========= Storing data for table products_sizes ======//
        if ($request->size_id) {
            foreach ($request->size_id as $key => $sizeId) {
                $product->rela_product_size()->create(
                    [
                        'product_id' => $product->id,
                        'size_id' => $sizeId,
                        'size_quantity' => $request->size_quantity[$key] ?? 0
                    ]
                );
            }
        }
        return redirect('/admin/product-detail-add')
            ->with('alert', 'Product ' . $request->product_name . ' is added successfully!');
        //return dd($request->toArray());
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
    public function product_detail_edit($id)
    {
        $sizes = Sizes::orderBy('size_number')->get();
        $colors = Colors::orderBy('id')->get();
        $groups = Groups::orderBy('id')->get();
        $categories = Categories::orderBy('id')->get();
        $products = Products::where('id', $id)->first();

        return view(
            'adminfrontend.pages.products.product_detail_edit',
            compact(
                'sizes',
                'colors',
                'groups',
                'categories',
                'products',
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
