@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-type-add')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-md-6">
                                <a class="btn btn-outline-primary rounded-0" href="{{url('/admin/product-category-add')}}" role="button">Add Category</a>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group w-50 ms-auto">
                                    <input type="search" class="form-control rounded-0" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="search">
                                    <button class="btn btn-outline-primary rounded-0" type="button" id="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 p-3 p-lg-4 border bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">PRODUCT TYPE</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTIVES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_categories as $row)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$row->category_name}}</td>
                                        <td>15</td>
                                        <td>{{$row->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-primary py-1 px-2 btn-sm" href="#" role="button">Edit</a>
                                            <a class="btn btn-danger py-1 px-2 btn-sm" href="#" role="button">Delete</a>
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