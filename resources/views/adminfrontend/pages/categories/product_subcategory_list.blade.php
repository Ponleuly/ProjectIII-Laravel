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

                <h4 class="mb-2 text-black">Sub Categories List</h4>
                <div class="p-3 p-lg-4 border bg-white">
                    <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/product-category-sub-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_subcategory"
                                            class="form-control rounded-0"
                                            placeholder="Enter subcategory name here..."
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
                                <th scope="col">SUB CATEGORY</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">GROUP</th>
                                <th scope="col">PRODUCTS</th>
                                <th scope="col">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                                @php
                                    $groups = Categories_Groups::where('category_id', $subcategory->category_id)->get();
                                    $product_count = Products_Attributes::where('subcategory_id', $subcategory->id)->distinct()->count('product_id');
                                @endphp
                                <tr class="text-center">
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$subcategory->sub_category}}</td>
                                    <td>{{$subcategory->rela_category_subcategory->category_name}}</td>
                                    <td>
                                        @foreach($groups as $group)
                                            {{$group->rela_category_group->group_name}}
                                            {{($loop->last)? '':'&'}}
                                        @endforeach
                                    </td>
                                    <td>{{$product_count}}</td>
                                    <td>{{$subcategory->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        @if($search_text == '')
                            <!--- To show data by pagination --->
                            {{$subcategories->links()}}
                             @else
                                <div class="d-flex mt-4" style="padding-top: 2px">
                                    <a
                                        class="btn btn-outline-danger rounded-0 mt-2"
                                        href="{{url('admin/product-category-sub-list')}}"
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