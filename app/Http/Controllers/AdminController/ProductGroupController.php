<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_group_list()
    {
        $groups = Groups::orderBy('group_name')->get();
        $count = 1;

        return view(
            'adminfrontend.pages.groups.product_group_list',
            compact(
                'groups',
                'count',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_group_add()
    {
        return view('adminfrontend.pages.groups.product_group_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_group_store(Request $request)
    {
        $input  = $request->all();
        Groups::create($input);

        // After inputed -> go back to category page
        return redirect('/admin/product-group-add')
            ->with('alert', 'Product group ' . $request->group_name . ' is added successfully!');
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
    public function product_group_edit($id)
    {
        $group = Groups::where('id', $id)->first();

        return view(
            'adminfrontend.pages.groups.product_group_edit',
            compact(
                'group'
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
    public function product_group_update(Request $request, $id)
    {
        $update_group_name = Groups::where('id', $id)->first();
        $update_group_name->group_name = $request->input('group_name');
        $update_group_name->update();

        return redirect('/admin/product-group-list')
            ->with(
                'alert',
                'Product group ' . '"' . $update_group_name->group_name . '"' .
                    ' is updated successfully !'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_group_delete($id)
    {
        $delete_group = Groups::where('id', $id)->first();
        $delete_group->delete();

        return redirect('/admin/product-group-list')
            ->with(
                'alert',
                'Product group ' . '"' . $delete_group->group_name . '"' .
                    ' is deleted successfully !'
            );
    }
}
