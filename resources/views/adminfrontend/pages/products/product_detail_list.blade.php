<?php
	use App\Models\Products_Attributes;
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
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">GROUP</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SUBCATEGORY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col" class="col-2">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td>
                                            <img src="/product_img/imgcover/{{$product->product_imgcover}}" class="img-fluid product-thumbnail product-img">
                                        </td>
                                        <td>{{$product->product_name}}</td>
                                        <td>
                                            @php
                                                $groupAttribute = Products_Attributes::where('product_id', $product->id)->get();
                                                $categoryAttribute = Products_Attributes::where('product_id', $product->id)->first();
                                            @endphp
                                            @foreach ($groupAttribute as $attribute)
                                                {{$attribute->rela_product_group->group_name}}
                                                {{($loop->last)? '':'&'}}
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$categoryAttribute->rela_product_category->category_name}}
                                        </td>
                                        <td>
                                            {{$categoryAttribute->rela_product_subcategory->sub_category}}
                                        </td>
                                        <td>${{$product->product_saleprice}}</td>
                                        <td>{{$product->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a
                                                class="btn btn-info py-1 px-2 btn-sm"
                                                style="font-size: 10px"
                                                href="{{url('/admin/product-detail-view/'.$product->product_code)}}"
                                                role="button"
                                                >
                                                View
                                            </a>
                                            <a
                                                class="btn btn-primary py-1 px-2 btn-sm"
                                                style="font-size: 10px"
                                                href="{{url('/admin/product-detail-edit/'.$product->id)}}"
                                                role="button"
                                                >
                                                Edit
                                            </a>
                                            <a
                                                class="btn btn-danger py-1 px-2 btn-sm"
                                                style="font-size: 10px"
                                                href="{{url('/admin/product-detail-delete/'.$product->id)}}"
                                                role="button"
                                                >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <!--- To show data by pagination --->
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection()