<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_categories;
use App\Models\Product_groups;
use App\Models\product_group_cate;




class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_category_list()
    {
        $product_categories = Product_categories::orderBy('category_name')->get();
        $count = 1;

        return view(
            'adminfrontend.pages.product_category_list',
            compact(
                'product_categories',
                'count',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_category_add()
    {
        $product_groups = Product_groups::orderBy('id')->get();
        $groups_count = Product_groups::all()->count();
        return view(
            'adminfrontend.pages.product_category_add',
            compact('product_groups', 'groups_count')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_category_store(Request $request)
    {

        $input = $request->all();
        // Storing category_name data to table product_categories
        Product_categories::create($input);

        // Storing category_id and group_id to table product_group_cate
        $Category = Product_categories::where('category_name', $request->category_name)->latest()->first();
        $categoryId = $Category->id;
        $groupId = $request->group_id;
        for ($i = 0; $i < count($groupId); $i++) {
            $save['category_id'] = $categoryId;
            $save['group_id'] = $groupId[$i];
            Product_group_cate::create($save);
        }

        // After inputed -> go back to category page
        return redirect('/admin/product-category-add')
            ->with('alert', 'Product category ' . $request->category_name . ' successfully!');
        //return dd($input);
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
