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
		  	<li class="breadcrumb-item text-light">Cart</li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->

	<div class="untree_co-section">
		<div class="container">
			@if(Session::has('alert'))
                <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                    {{Session::get('alert')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
		    <div class="row mb-3">
		        <div class="col-md-12">
		          	<div class="border p-3 rounded-0" role="alert">
		            	Have an account? <a href="#">Click here</a> to log in.
		        	</div>
		    	</div>
			</div>
			<hr>

			<div class="row">
				<!--------------------Start Cart list------------------------->
		        <div class="col-md-8 mb-5 mb-md-0 mt-3">
					@php
						$subtotal = 0;
						$total = 0;
						$discount = 0;
					@endphp
					@if((Cart::content()->count()) > 0)
						<!--*session('cart') as $id => $details-->
						@foreach ($carts as $cart)
							@php
								$subtotal += $cart->price * $cart->qty;
								$productCode = Products::where('id', $cart->id)->first();
							@endphp
							<div class="row form-group">
								<div class="col-md-2">
									<a href="{{url('product-detail/'.$productCode->product_code)}}">
										<img
											src="/product_img/imgcover/{{$cart->options->has('image') ? $cart->options->image : ''}}"
											class="img-fluid product-thumbnail"
										>
									</a>
								</div>
								<div class="col-md-7 d-grid">

									<div class="row">
										<a
											href="{{url('product-detail/'.$productCode->product_code)}}"
											class="text-decoration-none"
											>
											<h5 class="text-dark">{{$cart->name}}</h5>
										</a>
									</div>

									<div class="row">
										@php
        									$productGroups = Products_Attributes::where('product_id', $cart->id)->get();
										@endphp
										<label>
											@foreach ($productGroups as $group)
												{{$group->rela_product_group->group_name}}
												{{($loop->last)? '':'&'}}
											@endforeach
										</label>
									</div>
									<!---------- Start Size and Quantity ------------>
									<form action="{{url('update-cart/'.$cart->id)}}" method="POST" enctype="multipart/form-data">
                						@csrf <!-- to make form active -->
										@method('PUT')
										<div class="row mt-auto">
											@php
												$productSizes = Products_Sizes::where('product_id', $cart->id)->get();
												//Get size_id from Cart:: in colum options
												$size = $cart->options->has('size') ? $cart->options->size : '';
											@endphp
											<div class="col-md-3 ">
												<label class="text-black" for="size">SIZE</label>

												<select
													class="form-select form-control form-select-sm rounded-0"
													aria-label="Default select example"
													id="size"
													name="size_id"
													>
													@foreach ($productSizes as $productSize)
														<option
															value="{{$productSize->size_id}}"
															{{($productSize->size_id == $size) ? 'selected' : ''}}
														>
														{{$productSize->rela_product_size->size_number}}
													@endforeach
												</a>
												</select>
											</div>
											<div class="col-md-3 ">
												<label class="text-black">Quantity</label>
												<div class="cinput-group quantity-container ">
													<input
														type="number"
														name="quantity"
														class="form-control form-control-sm rounded-0"
														value="{{$cart->qty}}" max="5" min="1"
														placeholder=""
														aria-label="Example text with button addon"
														aria-describedby="button-addon1"
													>
												</div>
											</div>
											<div class="col-md-3 mt-auto">
												<div class="cinput-group quantity-container ">
													<button
														type="submit"
														class="btn btn-danger btn-sm rounded-0"
														>
														Update
													</button>
												</div>
											</div>
										</div>
									</form>
									<!---------- End Size and Quantity ------------>
								</div>

								<div class="col-md-3 d-grid">
									<div class="row text-end">
										<h5 class="text-dark">${{$cart->price}} x {{$cart->qty}}</h5>
									</div>
									<div class="row mt-auto justify-content-end">
										<div class="col-md-6 d-grid">
											<a
												href="#"
												class="btn btn-danger rounded-0 btn-sm mb-2 pb-0 pt-1"
												role="button"
												>
												<span class="material-icons-outlined" style="font-size: 20px">favorite</span>
											</a>
											<a
												href="{{url('remove-from-cart/'.$cart->id)}}"
												class="btn btn-danger rounded-0 btn-sm pb-0 pt-1"
												role="button"
												>
                            					<span class="material-icons-outlined"  style="font-size: 20px">delete</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<hr>
						@endforeach
						@else
							<h4>
								<p>There are no items in your cart.</p>
							</h4>
					@endif
					<!----------------------End cart list  Continue Shopping--------------------------->

					<!-------------- Start Remove all  and ----------------------->
					<div class="row">
						<div class="col-md-">
							<div class="row mb-5">
								<div class="col-md-6 mb-3 mb-md-0">
									<a
										href="{{url('remove-all-cart')}}"
										class="btn btn-black btn-sm btn-block rounded-0 px-5 py-2 fw-semibold"
										>
										Remove All
									</a>
								</div>
								<div class="col-md-6 d-flex justify-content-end">
									<a
										href="{{url('shop')}}"
										class="btn btn-outline-black btn-sm btn-block rounded-0 px-5 py-2 fw-semibold"
										>
										Continue Shopping
									</a>
								</div>
							</div>
						</div>
					</div>
		        </div>
				<!--------------------End Cart section------------------------->

				<!--------------------Start ORDER SUMMARY section------------------------->
		        <div class="col-md-4">
		          	<div class="row mb-5">
		            	<div class="col-md-12">
		              		<div class="p-3 p-lg-4 border bg-white">
								<h4 class="mb-3 text-black fw-bold">ORDER SUMMARY</h4>
								<hr>

								<h5 class="mb-2 text-black">Coupon</h5>
								<div class="d-grid col-md-12">
									<div class="input-group mb-2">
										<input
											type="text"
											class="form-control rounded-0"
											id="coupon"
											placeholder="Enter your promo code"
											aria-label="nhập mã"
											aria-describedby="button-addon2"
										>
										<button
											class="btn btn-outline-secondary px-3 fw-semibold rounded-0"
											type="button"
											id="button-addon2"
											>
											Apply
										</button>
									</div>
								</div>
								<hr>
								<table class="table site-block-order-table mb-3">
									<tbody>
										<tr>
											<td class="text-black font-weight-bold border-bottom-0">
												<strong>Items</strong>
											</td>
											<td class="text-black text-end border-bottom-0">
												<strong>{{$subtotal}} $</strong>
											</td>
										</tr>
										<tr>
											<td class="text-black font-weight-bold border-bottom-1">
												<strong>Discount</strong>
											</td>
											<td class="text-black text-end font-weight-bold border-bottom-1">
												<strong>{{$discount}} $</strong>
											</td>
										</tr>
										<tr>
											<td class="text-black h6 fw-bold border-bottom-0">
												<strong>Total</strong>
											</td>
											<td class="text-danger text-end h6 fw-bold border-bottom-0">
												<strong>{{$total = $subtotal - $discount}} $</strong>
											</td>
										</tr>
									</tbody>
								</table>

								<div class="d-grid">
									@if((Cart::content()->count()) == 0)
										<button
											class="btn btn-block px-4 py-2 fw-semibold rounded-0"
											onclick="location.href='{{ url('checkout') }}'"
											disabled
											>
											CHECKOUT
										</button>
									@else
										<button
											class="btn btn-block px-4 py-2 fw-semibold rounded-0"
											onclick="location.href='{{ url('checkout') }}'"
											>
											CHECKOUT
										</button>
									@endif
								</div>
		                	</div>
		            	</div>
		        	</div>
		    	</div>
			</div>
		</div>
		<!------------End  </form> --------------->
	</div>
@endsection()