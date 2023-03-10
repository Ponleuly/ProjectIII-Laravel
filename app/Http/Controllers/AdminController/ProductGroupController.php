<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups;

class ProductGroupController extends Controller
{

    public function product_group_list()
    {
        $groups = Groups::orderBy('group_name')->get();
        $count = 1;
        $search_text = '';
        return view(
            'adminfrontend.pages.groups.product_group_list',
            compact(
                'groups',
                'count',
                'search_text'
            )
        );
    }

    public function product_group_search()
    {
        $search_text = $_GET['search_group'];
        $groups = Groups::where('group_name', 'LIKE', '%' . $search_text . '%')->get();
        $count = 1;

        return view(
            'adminfrontend.pages.groups.product_group_list',
            compact(
                'groups',
                'count',
                'search_text'
            )
        );
    }

    public function product_group_add()
    {
        return view('adminfrontend.pages.groups.product_group_add');
    }


    public function product_group_store(Request $request)
    {
        $input  = $request->all();
        Groups::create($input);

        // After inputed -> go back to category page
        return redirect('/admin/product-group-add')
            ->with('alert', 'Product group ' . $request->group_name . ' is added successfully!');
    }


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
