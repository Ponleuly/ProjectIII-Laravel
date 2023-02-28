<?php
	use App\Models\Products_Attributes;
	use App\Models\Orders_Details;
	use App\Models\Products;
	use App\Models\Invoices;
	use App\Models\Orders_Statuses;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-group-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                        <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
		            @endif

                    <h4 class="mb-2 text-black">Product Details</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/product-detail-add')}}"
                                    role="button">
                                    Add Product
                                </a>
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
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ORDER DATE</th>
                                    <th scope="col">CUSTOMER</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">PAYMENT</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                    <th scope="col">INVOICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @php
                                        $paymentMethod = Orders_Details::where('order_id', $order->id)->first();
                                        $fee = $paymentMethod->delivery_fee;

                                        $total = 0;
                                        $orderDetails = Orders_Details::where('order_id', $order->id)->get();
                                        foreach ($orderDetails as  $orderDetail) {
                                            $price = $orderDetail->product_price;
                                            $qty = $orderDetail->product_quantity;
                                            $total += $price * $qty;
                                        }
                                        // Get invoice row by order_id
                                        $invoice = Invoices::where('order_id', $order->id)->first();
                                         // Get delivery statuses
                                        $statuses = Orders_Statuses::orderBy('id')->get();
                                        $status_name = Orders_Statuses::where('id', $invoice->status)->first();
                                    @endphp
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td>
                                            {{date('Y-m-d - H:i', strtotime($order->created_at))}}
                                        </td>
                                        <td>
                                            {{$order->rela_customer_order->c_name}}
                                        </td>
                                        <td>
                                            {{$order->rela_customer_order->c_phone}}
                                        </td>
                                        <td class="text-capitalize">
                                            {{$paymentMethod->payment_method}}
                                        </td>
                                        <td>
                                            $ {{number_format($total + $fee, 2)}}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm py-1 px-2">
                                                {{$status_name->status}}
                                            </button>
                                        </td>
                                        <td>
                                            <select class="form-select form-select-sm pe-1" aria-label="Default select example">
                                                @foreach ($statuses as $status)
                                                        <option
                                                        value ="{{$status->id}}"
                                                        onClick="window.location = '{{url('admin/delivery-list')}}'"
                                                        {{($status->id == $invoice->status)? 'selected': ''}}
                                                        >
                                                        {{$status->status}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a
                                                class="btn btn-info py-1 px-2 btn-sm"
                                                href="{{url('/admin/product-detail-view/')}}"
                                                role="button"
                                                >
                                                Details
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection()