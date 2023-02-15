<?php
	use App\Models\Categories_Groups;
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

                    <h4 class="mb-2 text-black">Product groups</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <a class="btn btn-outline-primary rounded-0" href="{{url('/admin/product-group-add')}}" role="button">Add Product Group</a>
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
                                    <th scope="col">PRODUCT GROUP</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groups as $row)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$row->group_name}}</td>
                                        <td>
                                            @php
                                                $category_count = Categories_Groups::where('group_id', $row->id)->count();
                                            @endphp
                                            {{$category_count}}
                                        </td>
                                        <td>{{$row->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-primary py-1 px-2 btn-sm" href="{{url('/admin/product-group-edit/'.$row->id)}}" role="button">Edit</a>
                                            <a class="btn btn-danger py-1 px-2 btn-sm" href="{{url('/admin/product-group-delete/'.$row->id)}}" role="button">Delete</a>
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