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
use App\Models\Products_Attributes;
use Illuminate\Support\Facades\File;

class ProductDetailController extends Controller
{

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


    public function product_detail_list()
    {
        $products = Products::orderByDesc('id')->paginate(6);
        $count = 1;
        $search_text = '';
        return view(
            'adminfrontend.pages.products.product_detail_list',
            compact(
                'products',
                'count',
                'search_text'
            )

        );
    }

    public function product_search()
    {
        $search_text = $_GET['search_product'];
        $products = Products::where('product_name', 'LIKE', '%' . $search_text . '%')->get();
        $count = 1;
        return view(
            'adminfrontend.pages.products.product_detail_list',
            compact(
                'products',
                'count',
                'search_text'
            )

        );
    }

    public function product_detail_view($code)
    {
        $product_view = Products::where('product_code', $code)->first();
        $productId = $product_view->id;

        $productSize = Products_Sizes::where('product_id', $productId)->get();
        $productGroups = Products_Attributes::where('product_id', $productId)->get();
        $productCategory = Products_Attributes::where('product_id', $productId)->first();
        $sizeStock = 0;
        $headCode = trim($code, " 0..9");
        $productCode = Products::where('product_code', 'LIKE', '%' . $headCode . '%')->get();
        //==== Calculate total quantity of each size ====//
        foreach ($productSize as $row) {
            $sizeStock += $row->size_quantity;
        }
        $stockLeft = $sizeStock;
        //===== Update product status if product stock sold out ======//
        if ($stockLeft == 0) {
            $status = Products::where('product_code', $code)->first();
            $status->product_status = 3; // is sold out
            $status->update();
        }
        return view(
            'adminfrontend.pages.products.product_detail_view',
            compact(
                'product_view',
                'stockLeft',
                'productCode',
                'productGroups',
                'productCategory'
            )

        );
    }



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
        $total_stock = 0;
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
                $total_stock += $request->size_quantity[$key] ?? 0;
            }
        }
        // =========== Store Total stock ==================//
        $stock = Products::latest()->first();
        $stock->product_stock = $total_stock;
        $stock->update();
        //========= Storing data for table products_attributes ======//
        /*
        foreach ($request->group_id as  $row => $value) {
            $group['group_id'] = $value;
            $group['product_id'] = $productId;
            Products_Groups::create($group);
        }
        */
        foreach ($request->group_id as  $row => $value) {
            $attribute['product_id'] = $productId;
            $attribute['subcategory_id'] = $request->subcategory_id;
            $attribute['category_id'] = $request->category_id;
            $attribute['group_id'] = $value;
            Products_Attributes::create($attribute);
        }
        return redirect('/admin/product-detail-add')
            ->with('message', 'Product ' . $request->product_name . ' is added successfully!');

        //return dd($total_stock);
    }



    public function product_detail_edit($id)
    {
        $sizes = Sizes::orderBy('size_number')->get();
        $groups = Groups::orderBy('id')->get();
        $selected_group = Products_Attributes::where('product_id', $id)->get();
        $selected_category = Products_Attributes::where('product_id', $id)->first();
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
                'selected_category'
            )
        );

        //return dd($colors->toArray());
    }




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
        //===========================================================//

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
            //==== Delete all data on table products_sizes if request has new size_id and value
            for ($i = 0; $i < count($productSize); $i++) {
                $deleteSize = Products_Sizes::where('product_id', $productId)->first();
                $deleteSize->delete();
            }
            $total_stock = 0;
            foreach ($request->size_id as $key => $sizeId) {
                $update_product->rela_product_size()->create(
                    [
                        'product_id' => $update_product->id,
                        'size_id' => $sizeId,
                        'size_quantity' => $request->size_quantity[$key] ?? 0
                    ]
                );
                $total_stock += $request->size_quantity[$key] ?? 0;
            }
        }
        // =========== Update Total stock ==================//
        $stock = Products::where('id', $id)->first();
        $stock->product_stock = $total_stock;
        $stock->update();
        //=============================================================================//

        //========= Update data for table products_groups ======//
        $deleteGroup = Products_Attributes::where('product_id', $productId)->get();
        foreach ($deleteGroup as $group) {
            $delete_group = Products_Attributes::where('product_id', $group->product_id)->first();
            $delete_group->delete();
        }
        foreach ($request->group_id as  $row => $value) {
            $attribute['group_id'] = $value;
            $attribute['product_id'] = $productId;
            $attribute['subcategory_id'] = $request->subcategory_id;
            $attribute['category_id'] = $request->category_id;
            Products_Attributes::create($attribute);
        }
        return redirect('/admin/product-detail-list')
            ->with('message', 'Product ' . $request->product_name . ' is updated successfully!');
    }


    public function product_detail_delete($id)
    {
        $delete_product = Products::where('id', $id)->first();
        $delete_product->delete();
        return redirect('/admin/product-detail-list')
            ->with(
                'message',
                'Product ' . '"' . $delete_product->product_name . '"' .
                    ' is deleted successfully !'
            );
    }

    //============= Update product status ============//
    public function product_detail_status($productId, $statusId)
    {
        $productStatus = Products::where('id', $productId)->first();
        $productStatus['product_status'] = $statusId;
        $productStatus->update();
        return redirect()->back()
            ->with('message', 'Product ' . $productStatus->product_name  . ' updated status successfully !');
    }
}
