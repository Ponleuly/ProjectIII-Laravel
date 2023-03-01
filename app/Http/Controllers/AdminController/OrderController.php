<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Orders;
use App\Models\Invoices;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Orders_Details;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_list()
    {
        $orders = Orders::orderBy('id')->get();
        $count = 1;
        return view(
            'adminfrontend.pages.orders.order_list',
            compact(
                'count',
                'orders'
            )
        );
    }

    //======  Order Details =======//
    public function order_details($id)
    {
        $order = Orders::where('id', $id)->first();
        $customer = Customers::where('id', $order->customer_id)->first();
        $orderDetails = Orders_Details::where('order_id', $id)->get();
        $count = 1;

        return view(
            'adminfrontend.pages.orders.order_details',
            compact(
                'count',
                'order',
                'customer',
                'orderDetails'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_invoice($id)
    {
        $order = Orders::where('id', $id)->first();
        $customer = Customers::where('id', $order->customer_id)->first();
        $orderDetails = Orders_Details::where('order_id', $id)->get();
        $count = 1;

        return view(
            'adminfrontend.pages.orders.order_invoice',
            compact(
                'count',
                'order',
                'customer',
                'orderDetails'
            )
        );
    }
    public function download_invoice($id)
    {
        $order = Orders::where('id', $id)->first();
        $customer = Customers::where('id', $order->customer_id)->first();
        $orderDetails = Orders_Details::where('order_id', $id)->get();
        $count = 1;
        $data = [
            'count' => $count,
            'order' =>  $order,
            'customer' => $customer,
            'orderDetails' => $orderDetails,
        ];
        $pdf = Pdf::loadView('adminfrontend.pages.orders.order_invoice', $data);

        return $pdf->download($order->invoice_code . '.pdf');
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
