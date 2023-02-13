<?php
	use App\Models\Product_colors;
	use App\Models\Product_sizes;

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
                                        <div class="col-sm py-3">
                                            <img src="/product_img/imgcover/{{$product_view->product_imgcover}}" class="img-fluid product-thumbnail">
                                        </div>
                                        <div class="col-sm py-3">
                                            <img src="/product_img/imgcover/{{$product_view->product_imgcover}}" class="img-fluid product-thumbnail">
                                        </div>
                                        <div class="col-sm py-3">
                                            <img src="/product_img/imgcover/{{$product_view->product_imgcover}}" class="img-fluid product-thumbnail">
                                        </div>
                                        <div class="col-sm py-3">
                                            <img src="/product_img/imgcover/{{$product_view->product_imgcover}}" class="img-fluid product-thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 px-4">
                                <div class="col-md-12 ">
                                    <h3 class="mb-2 text-black fw-bold">{{$product_view->product_name}}</h3>
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
                                            <p>{{$product_view->product_group->group_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Category: </h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{{$product_view->product_cate->category_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Total stock: </h5>
                                        </div>
                                        <div class="col-9 ms-0 ps-0">
                                            <p>{{$product_view->product_stock}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Colors: </h5>
                                        </div>
                                        <div class="col-9 row ms-0 ps-0">
                                            @php
                                                $colorId = $product_view->color_id;
                                            @endphp
                                            @foreach (json_decode($colorId) as $item)
                                                @php
                                                    $colors = Product_colors::where('id', intval($item))->first();
                                                @endphp
                                                <div class="color-product me-3" style="background: {{$colors->color_name}}"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <h5 class="text-black fw-bold mt-1">Sizes: </h5>
                                        </div>
                                        <div class="col-9 pe-2 ps-0 ms-0">
                                            <div class="row ms-0 ps-0">
                                                @php
                                                    $sizeId = $product_view->size_id;
                                                @endphp
                                                @foreach (json_decode($sizeId) as $item)
                                                    @php
                                                        $sizes = Product_sizes::where('id', intval($item))->first();
                                                    @endphp
                                                    <div class="color-product me-1 ms-0">{{$sizes->size}}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <div class="col-md-12">
                                                <div class="d-flex ">
                                                    <a class="btn btn-outline-danger rounded-0 mt-2" href="{{url('/admin/product-detail-list')}}" role="button">Back to list</a>
                                                    <a class="btn btn-primary rounded-0 ms-auto mt-2" href="{{url('/admin/product-detail-edit')}}" role="button">Edit Product</a>
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