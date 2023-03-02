<?php

use App\Models\Categories_Groups;
use App\Models\Products_Attributes;
use App\Models\Categories_Subcategories;
?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
<div class="container-fluid">
    <form action="{{url('/admin/product-type-add')}}" method="POST" enctype="multipart/form-data">
        @csrf <!-- to make form active -->
        <div class="row justify-content-center">
            <div class="col-md-12 my-3 mb-md-0">
                @if(Session::has('alert'))
                <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                    {{Session::get('alert')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h4 class="mb-2 text-black">Product Categories</h4>
                <div class="p-3 p-lg-4 border bg-white">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <a class="btn btn-outline-primary rounded-0" href="{{url('/admin/product-category-add')}}" role="button">Add Category</a>
                            <div class="input-group w-25 ms-auto">
                                <input type="search" class="form-control rounded-0" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="search">
                                <button class="btn btn-outline-primary rounded-0" type="button" id="search">Search</button>
                            </div>
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
                        <!--- To show data by pagination --->
                        {{$subcategories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection()