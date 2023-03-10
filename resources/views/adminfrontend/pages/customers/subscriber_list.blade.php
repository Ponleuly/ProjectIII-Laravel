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

                <h4 class="mb-2 text-black">Subscribers List</h4>
                <div class="p-3 p-lg-4 border bg-white">
                    <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/customer-subscriber-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_subscriber"
                                            class="form-control rounded-0"
                                            placeholder="Enter subscriber name here..."
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
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">DATE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr class="admin-table text-center">
                                    <th scope="row">{{$count++}}</th>
                                    <td>{{$subscriber->s_name}}</td>
                                    <td>{{$subscriber->s_email}}</td>
                                    <td>{{$subscriber->created_at->diffForHumans()}}</td>
                                    <td class="text-center">
                                        <a
                                            class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                            href="{{url('admin/customer-subscriber-delete/'.$subscriber->id)}}"
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
                    @if($search_text == '')
                        <!--- To show data by pagination --->
                        {{$subscribers->links()}}
                        @else
                            <div class="d-flex mt-4" style="padding-top: 2px">
                                <a
                                    class="btn btn-outline-danger rounded-0 mt-2"
                                    href="{{url('admin/customer-subscriber-list')}}"
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
@endsection()