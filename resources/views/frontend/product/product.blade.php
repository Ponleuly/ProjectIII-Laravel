@extends('index')
@section('content')
	<!-- Start breabcrumb Section -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
		  	<li class="breadcrumb-item ">
				<a href="{{url("home")}}" class="text-light">Home</a>
			</li>
		  	<li class="breadcrumb-item text-light">
				{{$group_name}}
			</li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->
	<div class="untree_co-section product-section">
		<div class="container">
			<div class="row">
				@foreach ($productGroups as $product)
					<!-- Start Column 1 -->
					<div class="col-12 col-md-4 col-lg-3">
						<a class="product-item" href="{{url('product-detail/'.$product->rela_group->product_code)}}">
							<img
								src="/product_img/imgcover/{{$product->rela_group->product_imgcover}}"
								class="img-fluid product-thumbnail"
							>
							<h3 class="product-title">{{$product->rela_group->product_name}}</h3>
							<strong class="product-price">
								$ {{number_format($product->rela_group->product_saleprice, 2)}}
							</strong>

							<span class="icon-cross">
								<img src="frontend/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 1 -->
				@endforeach
			</div>
			<div class="row mt-4">
				<div class="d-flex justify-content-end">
					<!--- To show data by pagination --->
					{{$productGroups->links()}}
                </div>
			</div>
		</div>
	</div>
@endsection()