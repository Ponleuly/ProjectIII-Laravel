<?php
	use App\Models\Products_Attributes;
?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                        <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
		            @endif

                    <h4 class="mb-2 text-black">Customers List</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12 d-flex">
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
                                    <th scope="col">NAME</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$customer->c_name}}</td>
                                        <td>{{$customer->c_phone}}</td>
                                        <td>{{$customer->c_email}}</td>
                                        <td>{{$customer->c_address}}</td>
                                        <td>{{$customer->created_at->diffForHumans()}}</td>
                                        <td class="text-center">
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                                href="{{url('/admin/customer-edit/'.$customer->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Customer"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">edit</span>
                                            </a></div>

                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                                href="{{url('/admin/customer-delete/'.$customer->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Delete Customer"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <!--- To show data by pagination --->
                            {{$customers->links()}}
                        </div>
                    </div>
                </div>
    </div>
@endsection()