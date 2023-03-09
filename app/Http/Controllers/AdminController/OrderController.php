<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Orders;
use App\Models\Invoices;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Orders_Details;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Products_Sizes;

class OrderController extends Controller
{

    public function order_list()
    {
        $orders = Orders::orderByDesc('id')->paginate(10); // Showing only 10 ordered per page
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
        $customer = Customers::where('id', $order->id)->first();
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
        $customer = Customers::where('id', $order->id)->first();
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


    //============= Update invoice status ============//
    public function order_status_action($orderId, $statusId)
    {
        $orderStatus = Orders::where('id', $orderId)->first();
        $orderStatus['order_status'] = $statusId;
        $orderStatus->update();
        // ==== If order is cancenled, update product size quantity
        if ($statusId == 4) {
            $order_details = Orders_Details::where('order_id', $orderId)->get();
            foreach ($order_details as $order_detail) {
                $productSize = Products_Sizes::where('product_id', $order_detail->product_id)
                    ->where('size_id', $order_detail->size_id)->first();
                $order_qty = $order_detail->product_quantity;
                $size_qty = $productSize->size_quantity;
                $productSize->size_quantity = $size_qty + $order_qty;
                $productSize->update();
            }
            //return dd($order_details->toArray());
        }
        return redirect()->back()
            ->with('message', 'Order with invoice code ' . $orderStatus->invoice_code  . ' updated status successfully !');
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
