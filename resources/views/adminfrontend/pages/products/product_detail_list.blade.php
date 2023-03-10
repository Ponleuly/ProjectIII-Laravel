<?php
	use App\Models\Products_Attributes;
	use App\Models\Products_Sizes;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
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

                    <h4 class="mb-2 text-black">Product Details</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/product-detail-add')}}"
                                    role="button">
                                    Add Product
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/product-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_product"
                                            class="form-control rounded-0"
                                            placeholder="Enter product name here..."
                                            aria-label="Recipient's username"
                                            aria-describedby="search"
                                            value="{{$search_text}}"
                                        >
                                        <button
                                            class="btn btn-outline-primary rounded-0"
                                            type="submit"
                                            id="search"
                                            >
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 p-3 p-lg-4 border bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center bg-primary text-light" style="font-size:13px">
                                    <th scope="col">#</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col" class="text-start">PRODUCT NAME</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col">STOCKLEFT</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">STATUS_ACTION</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col" class="text-center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    @php
                                        $stockLeft = 0;
                                        $groupAttribute = Products_Attributes::where('product_id', $product->id)->get();
                                        $categoryAttribute = Products_Attributes::where('product_id', $product->id)->first();
                                        $productSize = Products_Sizes::where('product_id', $product->id)->get();
                                        foreach ($productSize as $row) {
                                            $stockLeft  += $row->size_quantity;
                                        }
                                    @endphp

                                    <tr class="admin-table text-center">
                                        <th scope="row">{{$count++}}</th>
                                        <td>
                                            <img src="/product_img/imgcover/{{$product->product_imgcover}}" class="img-fluid product-thumbnail product-img">
                                        </td>
                                        <td  class="text-start">{{$product->product_name}}</td>
                                        <td>{{($categoryAttribute)? $categoryAttribute->rela_product_category->category_name: 'Deleted'}}</td>
                                        <td>${{$product->product_saleprice}}</td>
                                        <td>{{$product->product_stock}}</td>
                                        <td>{{$stockLeft}}</td>
                                        <td class="text-center py-0">
                                            <button
                                                type="button"
                                                class="btn btn-sm py-1 px-0
                                                    {{($product->product_status == 1)?  'btn-primary' : ''}}
                                                    {{($product->product_status == 2)?  'btn-success' : ''}}
                                                    {{($product->product_status == 3)?  'btn-danger' : ''}}
                                                    "
                                                    style="width: 65px;"
                                                >
                                                {{($product->product_status == 1)?  'New' : ''}}
                                                {{($product->product_status == 2)?  'Selling' : ''}}
                                                {{($product->product_status == 3)?  'Sold Out' : ''}}
                                            </button>
                                        </td>
                                        <td class="text-center" >
                                            <select
                                                class="form-select form-select-sm"
                                                aria-label="Default select example"
                                                >
                                                <option
                                                    value ="{{$product->product_status}}"
                                                    {{($product->product_status == 1)? 'selected': ''}}
                                                    onClick="window.location =
                                                    '{{url('admin/product-detail-status/'.$product->id .'/1')}}'"
                                                    >
                                                    New
                                                </option>
                                                <option
                                                    value ="{{$product->product_status}}"
                                                    {{($product->product_status == 2)? 'selected': ''}}
                                                    onClick="window.location =
                                                    '{{url('admin/product-detail-status/'.$product->id .'/2')}}'"
                                                    >
                                                    Selling
                                                </option>
                                                <option
                                                    value ="{{$product->product_status}}"
                                                    {{($product->product_status == 3)? 'selected': ''}}
                                                    onClick="window.location =
                                                    '{{url('admin/product-detail-status/'.$product->id .'/3')}}'"
                                                    >
                                                    Sold Out
                                                </option>
                                            </select>
                                        </td>
                                        <td>{{$product->created_at->diffForHumans()}}</td>
                                        <td class="text-center col-2">
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 view-btn"
                                                href="{{url('/admin/product-detail-view/'.$product->product_code)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="View Details"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">visibility</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                                href="{{url('/admin/product-detail-edit/'.$product->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Product"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">edit</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                                href="{{url('/admin/product-detail-delete/'.$product->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Delete Product"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            @if($search_text == '')
                                <!--- To show data by pagination --->
                                {{$products->links()}}
                                @else
                                    <div class="d-flex mt-4" style="padding-top: 2px">
                                            <a
                                                class="btn btn-outline-danger rounded-0 mt-2"
                                                href="{{url('admin/product-detail-list')}}"
                                                role="button"
                                                >
                                                Back to List
                                            </a>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection()