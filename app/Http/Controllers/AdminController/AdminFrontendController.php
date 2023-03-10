<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders_Details;
use Illuminate\Support\Facades\Auth;

class AdminFrontendController extends Controller
{
    public function dashboard()
    {
        $newOrder = Orders::where('order_status', 1)->count();
        $totalOrder = Orders::all()->count();
        $orders = Orders::where('order_status', 3)->get();
        $totalIncome = 0;
        foreach ($orders as $order) {
            $totalIncome += $order->total_paid;
        }
        return view(
            'adminfrontend.pages.dashboard',
            compact(
                'newOrder',
                'totalOrder',
                'totalIncome'
            )
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
