@extends('index')
@section('content')
    <!-- Start Hero Section -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
		  <li class="breadcrumb-item "><a href="{{url("home")}}" class="text-light">Home</a></li>
		  <li class="breadcrumb-item text-light" aria-current="page">Shop</li>
		</ol>
	</nav>
	<!-- End Hero Section -->
				<div class="container">

					<div class="row justify-content-between">
						<img src="frontend/images/shop_banner.jpg" class="img-fluid">

					<!--
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>

						<div class="col-lg-7">
							<div class="hero-img-wrap">
							</div>
						</div>
					-->
					</div>
				</div>
		<!--	</div>-->
		<!-- End Hero Section -->

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
					@foreach ($allProducts as $product)
						<!-- Start Column 1 -->
						<div class="col-12 col-md-4 col-lg-3 mb-5">
							<a class="product-item" href="{{url('product-detail/'.$product->product_code)}}">
								<img src="/product_img/imgcover/{{$product->product_imgcover}}" class="img-fluid product-thumbnail">
								<h3 class="product-title">{{$product->product_name}}</h3>
								<strong class="product-price">${{floatval($product->product_saleprice)}}</strong>
								<span class="icon-cross">
									<img src="frontend/images/cross.svg" class="img-fluid">
								</span>
							</a>
						</div>
						<!-- End Column 1 -->
					@endforeach

		      	</div>
		    </div>
		</div>
@endsection()