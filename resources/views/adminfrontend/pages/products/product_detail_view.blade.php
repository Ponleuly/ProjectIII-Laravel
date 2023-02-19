<?php
	use App\Models\Products_Colors;
	use App\Models\Products_Sizes;
	use App\Models\Products_Imgreviews;

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

                            <div class="col-md-4 mb-5">
                                <img src="/product_img/imgcover/{{$product_view ->product_imgcover}}" class="img-fluid product-thumbnail">
                                <div class="container px-0">
                                    <div class="row">
                                        @php
                                            $imgreviews = Products_Imgreviews::where('product_id', $product_view->id)->get();
                                        @endphp
                                        @foreach ($imgreviews as $imgreview)
                                            <div class="col-sm py-3">
                                                <img src="/product_img/imgreview/{{$imgreview->product_imgreview}}" class="img-fluid product-thumbnail">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 px-4">
                                <div class="col-md-12 ">
                                    <h3 class="mb-2 text-black fw-bold">{{$product_view->product_name}}</h3>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Code:</h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{{$product_view->product_code}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Price:</h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>${{$product_view->product_price}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Sale price:</h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>${{$product_view->product_saleprice}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Description:</h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{!! $product_view->product_des !!}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Group: </h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{{$product_view->rela_product_group->group_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Category: </h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{{$product_view->rela_product_category->category_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Total stock: </h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{{$totalStock}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            @php
                                                $colors = Products_Colors::where('product_id', $product_view->id)->get();
                                            @endphp

                                            <div class="border border-1 p-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-check-label" for="">
                                                            <div
                                                                class="py-2"
                                                                style="background: {{$product_view->product_color}};"
                                                                >
                                                                <a
                                                                    href="{{url('/admin/product-detail-view/')}}"
                                                                    style="color: {{$product_view->product_color}}"
                                                                    >
                                                                    {{$product_view->product_color}}
                                                                </a>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            @php
                                                $sizes = Products_Sizes::where('product_id', $product_view->id)->get();
                                            @endphp

                                            <div class="border border-1 p-3">
                                                <div class="row">
                                                    @foreach ($sizes as $item1)
                                                        <div class="col-md-3 ">
                                                            <div class="border border-1 py-1 px-2 my-1">
                                                                <div class="row mb-1">
                                                                    <div class="col-md-6">
                                                                        <label for="size"><p class="text-label">Size: </p></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label fw-500" for="size{{$item1->size_number}}">
                                                                            {{$item1->rela_product_size->size_number}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="size_quantity"><p class="text-label">Quantity: </p></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{$item1->size_quantity}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <div class="col-md-12">
                                                <div class="d-flex ">
                                                    <a class="btn btn-outline-danger rounded-0 mt-2" href="{{url('/admin/product-detail-list')}}" role="button">Back to list</a>
                                                    <a class="btn btn-primary rounded-0 ms-auto mt-2" href="{{url('/admin/product-detail-edit/'.$product_view->id)}}" role="button">Edit Product</a>
                                                </div>
                                            </div>
                                        </div>
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