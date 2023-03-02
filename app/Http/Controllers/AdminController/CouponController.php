<?php

namespace App\Http\Controllers\AdminController;

use DateTime;
use DateTimeZone;
use App\Models\Groups;
use App\Models\Coupons;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Categories_Subcategories;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupon_list()
    {
        $coupons = Coupons::orderByDesc('id')->paginate(10);
        $count = 1;
        return view(
            'adminfrontend.pages.coupons.coupon_list',
            compact(
                'coupons',
                'count',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupon_add()
    {
        $groups = Groups::orderBy('id')->get();
        $categories = Categories::orderBy('id')->get();
        $subcategories = Categories_Subcategories::orderBy('id')->get();

        return view(
            'adminfrontend.pages.coupons.coupon_add',
            compact(
                'groups',
                'categories',
                'subcategories'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function coupon_store(Request $request)
    {
        $currentTime = Carbon::now();
        //$end_date = date('Y-m-d  H:i:s', strtotime($request->end_date));
        $start_date = Carbon::create($request->start_date);
        $end_date = Carbon::create($request->end_date);
        if ($currentTime->gt($start_date)) {

            return redirect()->back()->with(
                'alert',
                'Your Date is expired !'
            );
        } elseif ($start_date->gt($end_date)) {
            return redirect()->back()->with(
                'alert',
                'Your Start Date is expired !'
            );
        } else {
            $input = $request->all();
            Coupons::create($input);
            return redirect()->back()
                ->with('message', 'Coupon ' . $request->campaign_name . ' is added successfully!');
        }
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
    public function coupon_edit($id)
    {
        $coupon = Coupons::where('id', $id)->first();
        $groups = Groups::orderBy('id')->get();
        $categories = Categories::orderBy('id')->get();
        $subcategories = Categories_Subcategories::orderBy('id')->get();
        return view(
            'adminfrontend.pages.coupons.coupon_edit',
            compact(
                'coupon',
                'groups',
                'categories',
                'subcategories'
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
    public function coupon_update(Request $request, $id)
    {
        $update_coupon = Coupons::where('id', $id)->first();
        $update_coupon->campaign_name = $request->input('campaign_name');
        $update_coupon->code = $request->input('code');
        $update_coupon->percentage = $request->input('percentage');
        $update_coupon->end_date = $request->input('end_date');
        $update_coupon->group_id = $request->input('group_id');
        $update_coupon->category_id = $request->input('category_id');
        $update_coupon->subcategory_id = $request->input('subcategory_id');
        $update_coupon->update();

        return redirect('admin/coupon-list')
            ->with(
                'message',
                'Coupon ' . '"' . $update_coupon->campaign_name . '"' .
                    ' is updated successfully !'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function coupon_delete($id)
    {
        $delete_coupon = Coupons::where('id', $id)->first();
        $delete_coupon->delete();

        return redirect('/admin/coupon-list')
            ->with(
                'message',
                'Coupon ' . '"' . $delete_coupon->campaign_name . '"' .
                    ' is deleted successfully !'
            );
    }
}
