<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$order->invoice_code}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
        }

    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <h2 class="pt-0 text-black fw-bold text-danger">15Steps</h2>
                    </div>
                    <div class="col-xl-3">
                        <ul class="list-unstyled">
                            <li class="text-muted">
                                <p class="fs-6 fw-bold mb-1">CONTACT</p>
                            </li>

                            <li class="text-muted">
                                <p class="text-muted fw-bold mb-0">Tel :
                                    <span class="fw-normal">084 3142 150</span>
                                </p>
                            </li>
                            <li class="text-muted">
                                <p class="text-muted fw-bold mb-0">Email :
                                    <span class="fw-normal">15steps@gmail.com</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </div>

                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="text-center">
                            <p class="h4 fw-bold">
                                INVOICE
                            </p>
                            <p class="text-muted fw-bold">{{$order->invoice_code}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9">
                            <ul class="list-unstyled">
                                <li class="text-muted"><p class="fs-5 fw-bold mb-1">CUSTOMER</p></li>
                                <li class="text-muted">{{$customer->c_name}}</li>
                                <li class="text-muted">{{$customer->c_phone}}</li>
                                <li class="text-muted">{{$customer->c_email}}</li>
                                <li class="text-muted">{{$customer->c_address}}</li>
                            </ul>
                        </div>
                        <div class="col-xl-3 ">
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    <p class="fs-5 fw-bold mb-1">ORDER</p>
                                </li>

                                <li class="text-muted">
                                    <p class="text-muted fw-bold mb-1">Code :
                                        <span class="fw-normal">{{$order->invoice_code}}</span>
                                    </p>
                                </li>
                                <li class="text-muted">
                                    <p class="text-muted fw-bold mb-1">Date :
                                        <span class="fw-normal">
                                            {{$order->created_at->toDayDateTimeString();}}
                                        </span>
                                    </p>
                                </li>
                                <li class="text-muted">
                                    <p class="text-muted fw-bold">Status :
                                        <span class="fw-normal">
                                            {{$order->rela_order_status->status}}
                                        </span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table ">
                            <thead class="text-white bg-danger">
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-start">PRODUCTS</th>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-9">
                            <p class=" fs-6 fw-bold mb-1 text-muted">PAYMENT METHOD</p>
                            <p class=" fs-6 mb-1 text-muted">{{$orderDetail->payment_method}}</p>
                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ">
                                    <p class="text-muted mb-1">SubTotal :
                                        <span class="fw-normal">$ {{number_format($totalAmount, 2)}}</span>
                                    </p>
                                </li>
                                <li class="text-muted ">
                                    <p class="text-muted  mb-1">Discount :
                                        <span class="fw-normal"> $ {{number_format($orderDetail->discount, 2)}}</span>
                                    </p>
                                </li>
                                <li class="text-muted ">
                                    <p class="text-muted  mb-1">Delivery Fee :
                                        <span class="fw-normal">$ {{$orderDetail->delivery_fee}}</span>
                                    </p>
                                </li>
                                <li class="text-muted ">
                                    <p class="text-muted fs-4 fw-bold mb-1">Total amount :
                                        <span class="text-danger ">
                                             @php
                                                $total = $totalAmount + ($orderDetail->delivery_fee) - ($orderDetail->discount);
                                            @endphp
                                            $ {{number_format($total, 2)}}
                                        </span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thanks you for your purchase !</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>