<?php
	use App\Models\Products_Sizes;
	use App\Models\Products_Attributes;
	use App\Models\Products;
	use App\Models\likes;

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

            <!---------------Sign in link ------------------------>
			@if(!(Auth::check() && Auth::user()->role == 1))
				<div class="row mb-3">
					<div class="col-md-12">
						<div class="border p-3 rounded-0" role="alert">
							Have an account ? <a href="{{url('login')}}">Click here</a> to sign in.
						</div>
					</div>
				</div>
			@endif
            <!--------------- End Sign in link ------------------------>

			<hr>

			<div class="row">
				<!--------------------Start Cart list------------------------->
		        <div class="col-md-8 mb-5 mb-md-0 mt-3">
					<!----- Price calculate --->
					@php
						$subtotal = 0;
						$total = 0;
						$discount = 0;
						$discount  =  Session::get('discount');
					@endphp
					<!---------------------->

					@if($carts_count > 0 )
						<!--*session('cart') as $id => $details-->
						@foreach ($carts as $cart)
							@php
								//--- Check if user is guest or sign in to display img from db ---//
								if(Auth::check() && Auth::user()->role == 1){
									$cartId = $cart->id;
									$productId = $cart->product_id;
									//$product = Products::where('id', $productId)->first();
									$productSizes = Products_Sizes::where('product_id', $productId)->get();

									// Image
									$productImg = $cart->rela_product_cart->product_imgcover;
									// Name
									$productName =  $cart->rela_product_cart->product_name;
									// Code
									$productCode =  $cart->rela_product_cart->product_code;
									// Size
									$size = $cart->size_id;
									// Quantity
									$quantity = $cart->product_quantity;
									//price
									$price =  $cart->product_price;
									$subtotal += $price * $quantity;
								}else{
									$cartId = $cart->rowId;
									$productId = $cart->id; // becoz in Cart model, column id is product_id
									$product = Products::where('id', $productId)->first();
									$productSizes = Products_Sizes::where('product_id', $productId)->get();

									// Image
									$productImg = $cart->options->has('image') ? $cart->options->image : '';
									// Name
									$productName = $cart->name;
									// Code
									$productCode =  $product->product_code;
									// Size ==>Get size_id from Cart:: in colum options
									$size = $cart->options->has('size') ? $cart->options->size : '';
									// Quantity
									$quantity = $cart->qty;
									// Price
									$price = $cart->price;
									$subtotal += $price * $quantity;
								}
							@endphp
							<div class="row form-group">
								<div class="col-md-2">
									<a href="{{url('product-detail/'. $productCode)}}">
										<img
											src="/product_img/imgcover/{{$productImg}}"
											class="img-fluid product-thumbnail"
										>
									</a>
								</div>
								<div class="col-md-7 d-grid">
									<div class="row">
										<a
											href="{{url('product-detail/'.  $productCode)}}"
											class="text-decoration-none"
											>
											<h5 class="text-dark">{{$productName}}</h5>
										</a>
									</div>

									<div class="row d-grid">
										@php
        									$productGroups = Products_Attributes::where('product_id', $productId)->get();
										@endphp
										<label>
											@foreach ($productGroups as $group)
												{{$group->rela_product_group->group_name}}
												{{($loop->last)? '':'&'}}
											@endforeach
										</label>
									</div>
									<!----------------------- Start Size and Quantity ---------------->
									<!------Form update Size and Quantity -------->
									<form
										action="{{url('update-cart/'.$cartId)}}"
										method="POST"
										enctype="multipart/form-data"
										>
                						@csrf <!-- to make form active -->
										@method('PUT')

										<div class="row mt-3">
											<div class="col-md-3  mt-auto d-grid">
												<label class="text-black" for="size">Size</label>
												<select
													class="form-select form-control form-select-sm rounded-0"
													aria-label="Default select example"
													id="size"
													name="size_id"
													>
													@foreach ($productSizes as $productSize)
														@php
															$sizeLeft = Products_Sizes::where('product_id',  $productId)
																->where('size_id', $productSize->size_id)->first();
														@endphp
														<option
															class="{{($sizeLeft->size_quantity == 0)? 'text-danger' : ''}}"
															value="{{$productSize->size_id}}"
															{{($productSize->size_id == $size) ? 'selected' : ''}}
															{{($sizeLeft->size_quantity == 0)? 'disabled':''}}
															>
															{{$productSize->rela_product_size->size_number}}
															{{($sizeLeft->size_quantity == 0)? '(Out of stock)':''}}
														</option>

													@endforeach
												</select>
											</div>
											<div class="col-md-3">
												<label class="text-black">Quantity</label>
												<div class="cinput-group quantity-container ">
													<input
														type="number"
														name="product_quantity"
														class="form-control form-control-sm rounded-0"
														value="{{$quantity}}" max="5" min="1"
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
									<!------ End Form update Size and Quantity -------->
									<!---------------------- End Size and Quantity -------------------->
								</div>

								<div class="col-md-3 d-grid">
									<div class="row text-end">
										<h5 class="text-dark">${{$price}} x {{$quantity}}</h5>
									</div>
									<div class="row mt-auto justify-content-end">
										<div class="col-md-6 d-grid">
											@php
                                            	if(Auth::check() && Auth::user()->role == 1){
                                                    $userId = Auth::user()->id;
                                                    $isLiked = Likes::where('product_id', $productId)->where('user_id',  $userId)->first();

                                                }else{
                                                    $userId = 0;
                                                    $isLiked = 0;
                                                }
                                            @endphp
                                            @if($isLiked)
												<a
													href="{{url('add-like/'.$productId.'/'.$userId)}}"
													class="btn btn-danger rounded-0 btn-sm mb-2 pb-0 pt-1"
													role="button"
													>
													<span class="material-icons-outlined" style="font-size: 20px">favorite</span>
												</a>
                                            @elseif($isLiked == 0)
												<a
													href="{{url('add-like/'.$productId.'/'.$userId)}}"
													class="btn btn-danger rounded-0 btn-sm mb-2 pb-0 pt-1 cart-add"
													role="button"
													>
													<span class="material-icons-outlined" style="font-size: 20px">favorite</span>
												</a>
                                            @endif
											<a
												href="{{url('remove-from-cart/'.$cartId)}}"
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
							<h4 class="py-2">
								<p>There are no items in your cart. Find some products
                            		<a href="{{url('shop')}}" class="text-danger">Click here !</a>
								</p>
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
									@php
                                        if(Auth::check() && Auth::user()->role == 1){
                                            $userId = Auth::user()->id;
                                        }else{
                                            $userId = 0;
                                        }
                                    @endphp
									<!---------------- Form to appy coupon ------------------->
									<form
										action="{{url('coupon-apply/'. $userId)}}"
										method="POST"
										enctype="multipart/form-data"
										>
										@csrf <!-- to make form active -->
										<div class="input-group mb-2">
											<input
												type="text"
												class="form-control rounded-0 text-uppercase"
												id="coupon"
												name="code"
												placeholder="Enter your promo code"
												aria-label="coupon"
												aria-describedby="button-addon2"
											>
											<button
												class="btn btn-outline-secondary px-3 fw-semibold rounded-0"
												type="submit"
												id="button-addon2"
												>
												Apply
											</button>
										</div>
									</form>
								</div>
								<hr>
								<table class="table site-block-order-table mb-3">
									<tbody>
										<tr>
											<td class="text-black font-weight-bold border-bottom-0">
												<strong>Subtotal</strong>
											</td>
											<td class="text-black text-end border-bottom-0">
												<strong>{{number_format($subtotal, 2)}} $</strong>
											</td>
										</tr>
										<tr>
											<td class="text-black font-weight-bold border-bottom-1">
												<strong>Discount</strong>
											</td>
											<td class="text-black font-weight-bold d-flex justify-content-end">
												<input
													class="form-control form-control-sm w-75 text-end pe-0 border-0 bg-white text-danger"
													name="discount"
													value="$ {{number_format($discount, 2)}}"
													aria-label=".form-control-sm example"
													readonly
													placeholder="$"
												>
											</td>
										</tr>
										<tr>
											<td class="text-black h6 fw-bold border-bottom-0">
												<strong>Total</strong>
											</td>
											<td class="text-danger text-end h6 fw-bold border-bottom-0">
												<strong>{{$total = number_format(($subtotal - $discount) ,2)}} $</strong>
											</td>
										</tr>
									</tbody>
								</table>

								<div class="d-grid">
									@if($carts_count == 0)
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
	</div>
@endsection()