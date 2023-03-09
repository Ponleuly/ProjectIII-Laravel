<?php
	use App\Models\Products_Attributes;
	use App\Models\Orders_Details;
	use App\Models\Products;
	use App\Models\Invoices;
	use App\Models\Orders_Statuses;
	use App\Models\Customers;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-group-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    <!--------------- Alert ------------------------>
                    @if(Session::has('alert'))
                        <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @elseif(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                                {{Session::get('message')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    @endif
                    <!---------------End Alert ------------------------>

                    <h4 class="mb-2 text-black">Orders List</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <!--
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/product-detail-add')}}"
                                    role="button">
                                    Add Product
                                </a>
                                -->
                                <div class="input-group w-25 ms-auto">
                                    <input group="search" class="form-control rounded-0" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="search">
                                    <button class="btn btn-outline-primary rounded-0" group="button" id="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 p-3 p-lg-4 border bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-light bg-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">ORDER DATE</th>
                                    <th scope="col">CODE</th>
                                    <th scope="col">CUSTOMER</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">PAYMENT</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col" class="text-center">STATUS</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                    <th scope="col" class="text-center">INVOICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @php
                                        $deliveryFee = $order->delivery_fee;
                                        $discount = $order->discount;

                                        $totalAmount = 0;
                                        $total = 0;
                                        $orderDetails = Orders_Details::where('order_id', $order->id)->get();
                                        foreach ($orderDetails as  $orderDetail) {
                                            $price = $orderDetail->product_price;
                                            $qty = $orderDetail->product_quantity;
                                            $totalAmount += $price * $qty;
                                        }
                                        $total = $totalAmount + $deliveryFee - $discount;
                                         // Get delivery statuses
                                        $statuses = Orders_Statuses::orderBy('id')->get();
                                        $status_name = Orders_Statuses::where('id', $order->order_status)->first();
                                    @endphp
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td>
                                            {{date('Y-m-d  H:i', strtotime($order->created_at))}}
                                        </td>
                                        <td>
                                            {{$order->invoice_code}}
                                        </td>
                                        <td>
                                            {{$order->rela_customer_order->c_name}}
                                        </td>
                                        <td>
                                            {{$order->rela_customer_order->c_phone}}
                                        </td>
                                        <td class="text-capitalize">
                                            {{$order->payment_method}}
                                        <td>
                                            $ {{number_format($total, 2)}}
                                        </td>
                                        <td class="text-center">
                                            <button
                                                type="button"
                                                class="btn btn-sm py-1 px-2
                                                    {{($order->order_status == 1)?  'btn-danger' : ''}}
                                                    {{($order->order_status == 2)?  'btn-primary' : ''}}
                                                    {{($order->order_status == 3)?  'btn-success' : ''}}
                                                    {{($order->order_status == 4)?  'btn-warning' : ''}}
                                                    "
                                                    style="width: 90px"
                                                >
                                                {{$status_name->status}}
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <select
                                                class="form-select form-select-sm"
                                                aria-label="Default select example"
                                                >
                                                @foreach ($statuses as $status)
                                                    <option
                                                        value ="{{$status->id}}"
                                                        {{($status->id == $order->order_status)? 'selected': ''}}
                                                        {{($order->order_status == 4)? 'disabled': ''}}
                                                        onClick="window.location = '{{url('admin/order-status-action/'.$order->id .'/'.$status->id)}}'"
                                                        >
                                                        {{$status->status}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <a
                                                class="btn btn-info py-1 px-2 btn-sm"
                                                href="{{url('admin/order-details/'. $order->id)}}"
                                                role="button"
                                                >
                                                Details
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <!--- To show data by pagination --->
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection()