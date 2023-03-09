<?php

use App\Models\Products_Attributes;
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

                <h4 class="mb-2 text-black">Members List</h4>
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
                            <tr class="bg-primary text-light ">
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
                            @foreach($members as $member)
                                <tr class="admin-table">
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->address}}</td>
                                    <td>{{$member->created_at->diffForHumans()}}</td>
                                    <td class="text-center">
                                        <!--
                                        <a
                                            class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                            href="{{url('/admin/customer-member-edit/'.$member->id)}}"
                                            role="button"
                                        >
                                            <span class="material-icons-round" style="font-size: 16px">edit</span>
                                        </a>
                                    -->
                                        <a
                                            class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                            href="{{url('admin/customer-member-delete/'.$member->id)}}"
                                            role="button"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Delete Member"
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
                    {{$members->links()}}
                </div>
            </div>
        </div>
</div>
@endsection()