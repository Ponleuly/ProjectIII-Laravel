<?php
	use App\Models\Categories_Groups;
	use App\Models\Products_Attributes;
	use App\Models\Categories_Subcategories;
?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
		            @endif

                    <h4 class="mb-2 text-black">Categories</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/product-category-add')}}"
                                    role="button">
                                    Add Category
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/product-category-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_category"
                                            class="form-control rounded-0"
                                            placeholder="Enter category name here..."
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
                                <tr class="bg-primary text-light text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SUB CATEGORY</th>
                                    <th scope="col">PRODUCTS</th>
                                    <th scope="col">CATEGORY GROUP</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    @php
                                        $groups =  Categories_Groups::where('category_id', $category->id)->get();
                                        $productCount =  Products_Attributes::where('category_id', $category->id)->distinct('product_id')->count();
                                    @endphp
                                    <tr class="text-center admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td>
                                            <img
                                                src="/product_img/imgcategory/{{$category->category_img}}"
                                                class="img-fluid product-thumbnail"
                                                style="width: 120px"
                                            >
                                        </td>
                                        <td>{{$category->category_name}}</td>
                                        <td>
                                            @php
                                                $sub_count = Categories_Subcategories::where('category_id', $category->id)->count();
                                            @endphp
                                            {{$sub_count}}
                                        </td>
                                        <td>{{$productCount}}</td>
                                        <td>
                                            @foreach($groups as $item)
                                                {{$item->rela_category_group->group_name}}
                                                {{($loop->last)? '':'&'}}
                                            @endforeach
                                        </td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 view-btn"
                                                href="{{url('/admin/product-category-view/'.$category->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="View Details"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">visibility</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                                href="{{url('/admin/product-category-edit/'.$category->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Product"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">edit</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                                 href="{{url('/admin/product-category-delete/'.$category->id)}}"
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
                            @if($search_text != '')
                                <div class="d-flex mt-4" style="padding-top: 2px">
                                    <a
                                        class="btn btn-outline-danger rounded-0 mt-2"
                                        href="{{url('admin/product-category-list')}}"
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