<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Orders_Statuses;
use App\Http\Controllers\Controller;

class OrderStatusController extends Controller
{
    //============= Update invoice status ============//
    public function order_status_action($orderId, $statuId)
    {
        $orderStatus = Orders::where('id', $orderId)->first();
        $orderStatus['order_status'] = $statuId;
        $orderStatus->update();
        return redirect()->back()
            ->with('message', 'Order with invoice code ' . $orderStatus->invoice_code  . ' updated status successfully !');
    }

    public function order_status_option()
    {
        $statuses = Orders_Statuses::orderBy('id')->get();
        $count = 1;
        return view(
            'adminfrontend.pages.statuses.status_list',
            compact(
                'count',
                'statuses'
            )
        );
    }
    public function order_status_add()
    {
        return view('adminfrontend.pages.statuses.status_add');
    }
    public function order_status_store(Request $request)
    {
        $input  = $request->all();
        Orders_Statuses::create($input);

        // After inputed -> go back to category page
        return redirect('/admin/order-status-add')
            ->with('message', 'Order status option ' . $request->status . ' is added successfully!');
    }
    public function order_status_edit($id)
    {
        $order_status_option = Orders_Statuses::where('id', $id)->first();

        return view(
            'adminfrontend.pages.statuses.status_edit',
            compact(
                'order_status_option'
            )
        );
    }
    public function order_status_update(Request $request, $id)
    {
        $update_order_status = Orders_Statuses::where('id', $id)->first();
        $update_order_status->status = $request->input('status');
        $update_order_status->update();

        return redirect('/admin/order-status-option')
            ->with(
                'message',
                'Order status option ' . '"' . $update_order_status->status . '"' .
                    ' is updated successfully !'
            );
    }
    public function order_status_delete($id)
    {
        $delete_status = Orders_Statuses::where('id', $id)->first();
        $delete_status->delete();

        return redirect('admin/order-status-option')
            ->with(
                'message',
                'Order status option ' . '"' . $delete_status->status . '"' .
                    ' is deleted successfully !'
            );
    }
}