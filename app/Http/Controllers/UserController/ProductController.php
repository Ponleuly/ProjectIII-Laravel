<?php

namespace App\Http\Controllers\UserController;

use App\Models\Groups;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Products_Sizes;
use App\Models\Products_Attributes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $allProducts = Products::orderBy('id')->get();
        return view(
            'frontend.product.shop',
            compact('allProducts')
        );
    }
    public function product($group)
    {
        $groupName = Groups::where('group_name', ucfirst($group))->first();
        $groupId = $groupName->id;
        $group_name = $groupName->group_name;
        $productGroups = Products_Attributes::where('group_id', $groupId)->get();
        return view(
            'frontend.product.product',
            compact('productGroups', 'group_name')
        );
        //return dd($productGroups);
    }

    public function product_detail($code)
    {
        $productDetails = Products::where('product_code', $code)->first();
        $productId = $productDetails->id;

        $productSize = Products_Sizes::where('product_id', $productId)->get();
        $productGroups = Products_Attributes::where('product_id', $productId)->get();
        $productAttribute = Products_Attributes::where('product_id', $productId)->first();
        $sizeStock = 0;
        $headCode = trim($code, "0..9");
        $productCode = Products::where('product_code', 'LIKE', '%' . $headCode . '%')->get();


        foreach ($productSize as $row) {
            $sizeStock += $row->size_quantity;
        }
        $totalStock = $sizeStock;

        return view(
            'frontend.product.product_detail',
            compact(
                'productDetails',
                'totalStock',
                'productCode',
                'productGroups',
                'productSize',
                'productAttribute'
            )
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_category($group, $category)
    {
        $groupName = Groups::where('group_name', ucfirst($group))->first();
        $groupId = $groupName->id;

        $categoryName = Categories::where('category_name', ucfirst($category))->first();
        $categoryId = $categoryName->id;

        $productCategory = Products_Attributes::where('group_id', $groupId)
            ->where('category_id', $categoryId)->get();

        $group_name = $groupName->group_name;
        return view(
            'frontend.product.product_category',
            compact(
                'productCategory',
                'group_name',
                'category'
            )
        );

        //return dd($productCategory);
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
