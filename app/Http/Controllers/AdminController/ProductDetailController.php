<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Sizes;
use App\Models\Categories_Subcategories;
use App\Models\Groups;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Products_Sizes;
use App\Models\Products_Imgreviews;
use App\Http\Controllers\Controller;
use App\Models\Products_Groups;
use Illuminate\Support\Facades\File;

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
        $groups = Groups::orderBy('id')->get();
        $categories = Categories::orderBy('id')->get();
        $subCategories = Categories_Subcategories::orderBy('id')->get();


        return view(
            'adminfrontend.pages.products.product_detail_add',
            compact(
                'sizes',
                'groups',
                'categories',
                'subCategories'
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
        $products = Products::orderByDesc('id')->get();
        $count = 1;
        return view(
            'adminfrontend.pages.products.product_detail_list',
            compact(
                'products',
                'count'
            )

        );
    }
    public function product_detail_view($code)
    {
        $product_view = Products::where('product_code', $code)->first();
        $productId = $product_view->id;

        $productSize = Products_Sizes::where('product_id', $productId)->get();
        $productGroups = Products_Groups::where('product_id', $productId)->get();
        $sizeStock = 0;
        $headCode = trim($code, " 0..9");
        $productCode = Products::where('product_code', 'LIKE', '%' . $headCode . '%')->get();

        /*
        $productColor = Products_Colors::where('product_id', $productId)->get();
        $colorStock = 0;
        foreach ($productColor as $row) {
            $colorStock += $row->color_quantity;
        }
        */
        foreach ($productSize as $row) {
            $sizeStock += $row->size_quantity;
        }
        $totalStock = $sizeStock;

        return view(
            'adminfrontend.pages.products.product_detail_view',
            compact(
                'product_view',
                'totalStock',
                'productCode',
                'productGroups'
            )

        );

        //return dd($productCode->toArray());


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
            $destination_path = 'product_img/imgcover/';
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
            $destinationPath = 'product_img/imgreview/';
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
        //========= Storing data for table products_groups ======//
        foreach ($request->group_id as  $row => $value) {
            $group['group_id'] = $value;
            $group['product_id'] = $productId;
            Products_Groups::create($group);
        }
        return redirect('/admin/product-detail-add')
            ->with('alert', 'Product ' . $request->product_name . ' is added successfully!');

        //return dd($value);
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
        $groups = Groups::orderBy('id')->get();
        $selected_group = Products_Groups::where('product_id', $id)->get();
        $categories = Categories::orderBy('id')->get();
        $subCategories = Categories_Subcategories::orderBy('id')->get();
        $products = Products::where('id', $id)->first();


        return view(
            'adminfrontend.pages.products.product_detail_edit',
            compact(
                'sizes',
                'groups',
                'categories',
                'products',
                'subCategories',
                'selected_group',
            )
        );

        //return dd($colors->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_detail_update(Request $request, $id)
    {

        //======== Update data on table products ========//
        $update_product  = Products::where('id', $id)->first();
        $update_product->product_name = $request->input('product_name');
        $update_product->product_code = $request->input('product_code');
        $update_product->product_des = $request->input('product_des');
        $update_product->product_price = $request->input('product_price');
        $update_product->product_color = $request->input('product_color');
        $update_product->product_saleprice = $request->input('product_saleprice');
        $update_product->category_id = $request->input('category_id');
        $update_product->subcategory_id = $request->input('subcategory_id');

        //========= Update data for table products ======//
        if ($request->hasFile('product_imgcover')) {

            $destination_path = 'product_img/imgcover';
            $image = $request->file('product_imgcover');
            if (File::exists(public_path($destination_path))) {
                File::delete(public_path($destination_path));
            }
            $image_name = $image->getClientOriginalName();
            $image->move($destination_path, $image_name);

            $update_product['product_imgcover'] = $image_name;
        }
        $update_product->update();
        //=======================================//

        //========= Update data for table products_imgreviews ======//
        $productId = $update_product->id;
        $destinationPath = 'product_img/imgreview/';
        $imgReview = Products_Imgreviews::where('product_id', $productId)->get();

        if ($file = $request->hasFile('product_imgreview')) {
            //====== Delete imgreview in table Product_imgreview ======/
            for ($i = 0; $i < count($imgReview); $i++) {
                $delete_img = Products_Imgreviews::where('product_id', $productId)->first();
                $path = 'product_img/imgreview/' . $delete_img->product_imgreview;

                if (File::exists(public_path($path))) {
                    File::delete(public_path($path));
                }
                $delete_img->delete();
            }
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

        //========= Update data for table products_sizes ======//
        $productSize = Products_Sizes::where('product_id', $productId)->get();

        if ($request->size_id) {
            //==== Delete all data on table products_sizes if request has new size_id value
            for ($i = 0; $i < count($productSize); $i++) {
                $deleteSize = Products_Sizes::where('product_id', $productId)->first();
                $deleteSize->delete();
            }

            foreach ($request->size_id as $key => $sizeId) {
                $update_product->rela_product_size()->create(
                    [
                        'product_id' => $update_product->id,
                        'size_id' => $sizeId,
                        'size_quantity' => $request->size_quantity[$key] ?? 0
                    ]
                );
            }
        }
        //========= Update data for table products_groups ======//
        $deleteGroup = Products_Groups::where('product_id', $productId)->get();
        foreach ($deleteGroup as $row) {
            $delete_group = Products_Groups::where('product_id', $row->product_id)->first();
            $delete_group->delete();
        }
        foreach ($request->group_id as  $row => $value) {
            $group['group_id'] = $value;
            $group['product_id'] = $productId;
            Products_Groups::create($group);
        }
        return redirect('/admin/product-detail-list')
            ->with('alert', 'Product ' . $request->product_name . ' is updated successfully!');

        //return dd($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_detail_delete($id)
    {
        $delete_product = Products::where('id', $id)->first();
        $delete_product->delete();

        return redirect('/admin/product-detail-list')
            ->with(
                'alert',
                'Product ' . '"' . $delete_product->product_name . '"' .
                    ' is deleted successfully !'
            );
    }
}
