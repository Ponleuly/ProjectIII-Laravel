@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-group-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('message')}}
                        <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
		            @endif

                    <h4 class="mb-2 text-black">Product Colors</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <a class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/delivery-add')}}"
                                    role="button">
                                    Add Delivery Option
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
                                <tr class="bg-primary text-light text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">DELIVERY OPTION</th>
                                    <th scope="col">DELIVERY FEE</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deliveries as $delivery)
                                    <tr class="text-center">
                                        <th scope="row">{{$count++}}</th>
                                        <td>
                                            {{$delivery->delivery_option}}
                                        </td>
                                        <td>
                                           $ {{$delivery->delivery_fee}}
                                        </td>
                                        <td>{{$delivery->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a
                                                class="btn btn-primary py-1 px-2 btn-sm"
                                                href="{{url('/admin/delivery-edit/'. $delivery->id)}}" role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Delivery Option"
                                                >
                                                Edit
                                            </a>
                                            <a
                                                class="btn btn-danger py-1 px-2 btn-sm"
                                                href="{{url('/admin/delivery-delete/'. $delivery->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Delete Delivery Option"
                                                >
                                                Delete
                                            </a>
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