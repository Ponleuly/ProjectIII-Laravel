<?php
	use App\Models\Products_Colors;
	use App\Models\Products_Sizes;
	use App\Models\Products_Imgreviews;
?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    <h4 class="mb-2 text-black">Order Details</h4>
                    <div class="p-lg-5 border bg-white">
                        <!------------------ Invoice header ------------------------>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-2 text-black fw-bold">INVOICE</h4>
                                <p class="fs-6 fw-bold">STATUS :
                                    <button
                                        type="button"
                                        class="btn btn-sm py-0 px-2
                                            {{($order->order_status == 1)?  'btn-danger' : ''}}
                                            {{($order->order_status == 2)?  'btn-primary' : ''}}
                                            {{($order->order_status == 3)?  'btn-success' : ''}}
                                            {{($order->order_status == 4)?  'btn-warning' : ''}}
                                        "
                                        >
                                        {{$order->rela_order_status->status}}
                                    </button>
                                </p>
                            </div>
                            <div class="col-md-6 text-end">
                                <h2 class="mb-2 text-black fw-bold text-danger">15Steps</h2>
                                <p class="">Tel : 084 111 1555</p>
                                <p class="">Email : 15steps@gmail.com</p>
                            </div>
                        </div>
                        <!------------------ End Invoice header ------------------------>
                        <hr class="border-2">

                        <!------------------Invoice customer information ---------------->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p class="fs-6 fw-bold">DATE</p>
                                <p>{{$order->created_at->toDayDateTimeString();}}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p class="fs-6 fw-bold">INVOICE</p>
                                <p>{{$order->invoice_code}}</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <p class="fs-6 fw-bold">CUSTOMER</p>
                                <p class="text-capitalize">{{$customer->c_name}}</p>
                                <p>{{$customer->c_phone}}</p>
                                <p>{{$customer->c_email}}</p>
                                <p>{{$customer->c_address}}</p>
                            </div>
                        </div>
                        <!-------------- End Invoice customer information ---------------->

                        <!------------------ Invoice table ------------------->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <table class="table border">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-start">PRODUCT NAME</th>
                                            <th scope="col">SIZE</th>
                                            <th scope="col">QUANTITY</th>
                                            <th scope="col">ITEM PRICE</th>
                                            <th scope="col">AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach ($orderDetails as $orderDetail)
                                            <tr class="text-center">
                                                <th scope="row">{{$count++}}</th>
                                                <td class="text-start">
                                                    {{$orderDetail->rela_product_order->product_name}}
                                                </td>
                                                <td>{{$orderDetail->rela_size_order->size_number}}</td>
                                                <td>{{$orderDetail->product_quantity}}</td>
                                                <td>$ {{$orderDetail->product_price}}</td>
                                                <td>
                                                    @php
                                                        $price = $orderDetail->product_price;
                                                        $qty = $orderDetail->product_quantity;
                                                        $amount = $price * $qty;
                                                        $totalAmount += $amount;
                                                    @endphp
                                                    $ {{number_format($amount, 2)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                Subtotal
                                            </td>
                                            <td class="text-center text-danger">
                                                $ {{number_format($totalAmount, 2)}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!------------------ End Invoice table ------------------->
                        <div class="p-lg-4 border rounded-2 bg-light text-dark">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="fs-6 fw-bold text-center">PAYMENT METHOD</p>
                                    <p class="text-capitalize fw-bold text-center text-black-50">
                                        {{$orderDetail->payment_method}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="fs-6 fw-bold text-center">DELIVERY FEE</p>
                                    <p class="text-capitalize fw-bold text-center text-black-50 text-danger">
                                        $ {{$orderDetail->delivery_fee}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="fs-6 fw-bold text-center">DISCOUNT</p>
                                    <p class="text-capitalize fw-bold text-center text-black-50 text-danger">
                                        $ {{number_format($orderDetail->discount, 2)}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p class="fs-6 fw-bold text-center">TOTAL AMOUNT</p>
                                    <p class="fs-5 text-capitalize fw-bold text-center text-black-50 text-danger">
                                        @php
                                            $total = $totalAmount + ($orderDetail->delivery_fee) - ($orderDetail->discount);
                                        @endphp
                                        $ {{number_format($total, 2)}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-2 mt-3">
                                <div class="col-md-12">
                                    <div class="d-flex ">
                                        <a
                                            class="btn btn-outline-danger rounded-0 mt-2"
                                            href="{{url('admin/order-list')}}"
                                            role="button"
                                            >
                                            Back to list
                                        </a>
                                        <a
                                            class="btn btn-primary rounded-0 ms-auto mt-2"
                                            href="{{url('/admin/product-detail-edit/')}}"
                                            role="button"
                                            >
                                            Download Invoice PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection()