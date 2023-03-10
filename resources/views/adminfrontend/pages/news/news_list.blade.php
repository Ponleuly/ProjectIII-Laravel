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

                    <h4 class="mb-2 text-black">News & Introducing List</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/news-add')}}"
                                    role="button">
                                    Add News & Introducing
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/news-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_news"
                                            class="form-control rounded-0"
                                            placeholder="Enter news title here..."
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
                                    <th scope="col">IMAGE</th>
                                    <th scope="col" class="text-start">TITLE</th>
                                    <th scope="col" class="text-start">CONTENT</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $new)
                                    <tr class="text-center admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td class="col-3">
                                            <img
                                                src="/product_img/imgnews/{{$new->news_img}}"
                                                class="img-fluid product-thumbnail"
                                            >
                                        </td>
                                        <td class="text-start col-2">{{$new->news_title}}</td>
                                        <td class="text-start text-wrap">{!! $new->news_content !!}</td>
                                        <td class="col-1">{{$new->created_at->diffForHumans()}}</td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-sm py-1 px-2
                                                    {{($new->news_status == 1)?  'btn-warning' : ''}}
                                                    {{($new->news_status == 0)?  'btn-danger' : ''}}
                                                    "
                                                    style="width: 90px"
                                                >
                                                {{($new->news_status == 1)? 'Active':''}}
                                                {{($new->news_status == 0)? 'Inactive':''}}
                                            </button>
                                        </td>
                                        <td class="col-1">
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                                href="{{url('/admin/news-edit/'.$new->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Product"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">edit</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                                href="{{url('/admin/news-delete/'.$new->id)}}"
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
                                        href="{{url('admin/news-list')}}"
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