<?php
	use App\Models\Products_Sizes;
	use App\Models\Products_Attributes;
	use App\Models\Products;
?>
@extends('index')
@section('content')
    <!-- Start breabcrumb Section -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
		  	<li class="breadcrumb-item ">
				<a href="{{url("home")}}" class="text-light">Home</a>
			</li>

		  	<li class="breadcrumb-item text-light">Liked</li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->

	<div class="untree_co-section before-footer-section">
        <div class="container">
            <hr class="line-color">
            @foreach ($likes as $like)
                @php
        			$productGroups = Products_Attributes::where('product_id', $like->product_id)->get();
				    $productSizes = Products_Sizes::where('product_id', $like->product_id)->get();
                @endphp
                <div class="row my-5">
                    <div class="col-md-2">
                        <a  href="{{url('product-detail/'.$like->rela_product_like->product_code)}}">
                            <img
                                src="/product_img/imgcover/{{$like->rela_product_like->product_imgcover}}"
                                class="img-fluid product-thumbnail"
                            >
                        </a>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-2 text-black fw-bold">
                            <a
                                href="{{url('product-detail/'.$like->rela_product_like->product_code)}}"
                                class="text-decoration-none"
                                >
                                {{$like->rela_product_like->product_name}}
                            </a>
                        </h4>
                        <label>
							@foreach ($productGroups as $group)
								{{$group->rela_product_group->group_name}}
								{{($loop->last)? '':'&'}}
							@endforeach
						</label>
                        <h6 class="text-danger fw-bold py-3">
                            <strong>${{$like->rela_product_like->product_saleprice}}</strong>
                        </h6>

                        <div class="row">
                            <div class="col-md-3 pt-3">
                                <h6 class="text-black fw-bold">Size</h6>
                                <select
									class="form-select form-control rounded-0"
									aria-label="Default select example"
									id="size"
									name="size_id"
									>
									@foreach ($productSizes as $productSize)
										<option
											value="{{$productSize->size_id}}"
										>
										{{$productSize->rela_product_size->size_number}}
									@endforeach
								</select>
                            </div>
                            <div class="col-md-3 pt-3">
                                <h6 class="text-black fw-bold">Quantity</h6>
                                <div class="form-outline">
                                    <input
										type="number"
										name="product_quantity"
										class="form-control rounded-0"
										value="1" max="5" min="1"
										placeholder=""
										aria-label="Example text with button addon"
										aria-describedby="button-addon1"
									>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end flex-column justify-content-end">
                        <div class="col-sm-2 d-grid py-3">
                            <a
                                href=""
                                class="btn btn-block py-1 fw-semibold rounded-0 cart-add">
                                <span class="material-icons-outlined py-1">shopping_cart</span>
                            </a>
                        </div>
                        <div class="col-sm-2 d-grid">
                            <a
                                href=""
                                class="btn btn-block py-1 fw-semibold rounded-0">
                                <span class="material-icons-outlined py-1">delete</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="row my-5">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="" class="btn btn-block py-1 px-5 fw-semibold rounded-0 me-1">
                        <span>Remove All</span>
                    </a>
                    <a href="{{url('shop')}}" class="btn btn-block py-1 px-5 fw-semibold rounded-0 ms-1">
                        <span>Continue Shopping</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection()