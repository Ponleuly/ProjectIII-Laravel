<?php
	use App\Models\Products_Colors;
	use App\Models\Products_Sizes;
	use App\Models\Products_Imgreviews;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h4 class="my-3 text-black">News Details</h4>
            <div class="col-md-12 my-2 mb-md-0">
                <div class="p-3 p-lg-4 border bg-white">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 text-center mb-3">
                            <h4>{{$news->news_title}}</h4>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <p class="text-medium">{!! $news->news_content !!}</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 mt-4">
                            <img
                                src="/product_img/imgnews/{{$news->news_img}}"
                                class="img-fluid product-thumbnail"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()