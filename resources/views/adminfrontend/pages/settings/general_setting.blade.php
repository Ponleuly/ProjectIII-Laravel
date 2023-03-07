@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-type-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
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

                    <h4 class="mb-2 text-black">General Settings</h4>
                    <div class="mt-3 p-3 p-lg-4 border bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th scope="col" class="col-md-1">#</th>
                                    <th scope="col" class="col-md-5">CONTENT</th>
                                    <th scope="col" class="col-md-6">DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Website Name</th>
                                        <td>{{$setting->website_name}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Home Page Slogan</th>
                                        <td>{{$setting->home_pageSlogan}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Home Page Text</th>
                                        <td>{{$setting->home_pageText}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Facebook Link</th>
                                        <td>{{($setting->facebook_link)? $setting->facebook_link:'None'}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Instagram Link</th>
                                        <td>{{($setting->instagram_link)? $setting->instagram_link:'None'}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Youtube Link</th>
                                        <td>{{($setting->youtube_link)? $setting->youtube_link:'None'}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Tik Tok Link</th>
                                        <td>{{($setting->tiktok_link)? $setting->tiktok_link:'None'}}</td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Home Page Image</th>
                                        <td>
                                            <div class="col-md-6">
                                                <img
                                                    src="/product_img/imghomepage/{{$setting->home_pageImage}}"
                                                    class="img-fluid product-thumbnail"
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <th>Section Page Image</th>
                                        <td>
                                            <div class="col-md-6">
                                                <img
                                                    src="/product_img/imghomepage/{{$setting->section_pageImage}}"
                                                    class="img-fluid product-thumbnail"
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a
                            class="btn btn-outline-danger rounded-0 mt-2"
                            href="{{url('admin/general-setting-edit')}}"
                            role="button"
                            >
                            Edit Settings
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection()