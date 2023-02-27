<?php
	use App\Models\Sizes;
	use App\Models\Products_Attributes;
	use App\Models\Products;
	use App\Models\Products_Sizes;

?>
@extends('index')
@section('content')
	<!-- Start breabcrumb Section -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
		  	<li class="breadcrumb-item ">
				<a href="{{url("home")}}" class="text-light">Home</a>
			</li>
			<li class="breadcrumb-item ">
				<a href="{{url("cart")}}" class="text-light">Cart</a>
			</li>
		  	<li class="breadcrumb-item text-light">Checkout</li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->
	<div class="untree_co-section">

			<div class="container">
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
		      	<!----------------Start </form> -------------->
				<form
					action="{{url('place-order')}}"
					method="POST"
					enctype="multipart/form-data"
					>
                	@csrf <!-- to make form active -->
					<div class="row">
						<!------------------------Delivery Informations--------------------------------->
						<div class="col-md-6 mb-5 mb-md-0">
							<div class="p-3 p-lg-4 border bg-white">
								<h2 class="h3 mb-3 text-black">Delivery Informations</h2>
								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="c_name" class="text-black mb-1">Customer Name <span class="text-danger">*</span></label>
										<input
											type="text"
											class="form-control rounded-0"
											id="c_name"
											name="c_name"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->name : ''}}"
											placeholder="Full Name"
											required
										>
									</div>
								</div>

								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="c_phone" class="text-black mb-1">Phone Number <span class="text-danger">*</span></label>
										<input
											type="text"
											class="form-control rounded-0"
											id="c_phone"
											name="c_phone"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->phone : ''}}"
											placeholder="Phone Number"
											required
										>
									</div>
								</div>

								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="c_email" class="text-black mb-1">Email <span class="text-danger">*</span></label>
										<input
											type="email"
											class="form-control rounded-0"
											id="c_email"
											name="c_email"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->email : ''}}"
											placeholder="Example@gmail.com"
											required
										>
									</div>
								</div>

								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="c_address" class="text-black mb-1">Address <span class="text-danger">*</span></label>
										<input
											type="text"
											class="form-control rounded-0"
											id="c_address"
											name="c_address"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->address: ''}}"
											placeholder="House number, City ...."
											required
										>
									</div>
								</div>

								<div class="form-group mb-3">
									<label for="c_note" class="text-black mb-1">Order Note</label>
									<textarea name="c_note" id="c_note" cols="30" rows="5" class="form-control rounded-0" placeholder="Write here..."></textarea>
								</div>

								<h2 class="h3 mb-3 text-black">Delivery Method</h2>
								@foreach ($deliveries as $delivery)
									<div class="row">
										<div class="col-md-8">
											<div class="form-check">
												<input
													class="form-check-input big-radio me-2 mb-2 mt-1"
													type="radio"
													name="delivery_id"
													id="delivery_option"
													value="{{$delivery->id}}"
													@if ($loop->first)
														checked
													@endif
												>
												<label class="form-check-label text-dark mt-1 fs-6" for="delivery_option">
													{{$delivery->delivery_option}}
												</label>
											</div>
										</div>
										<div class="col-md-4 d-flex justify-content-end">
											<label class="form-check-label text-dark fs-6" for="delivery_option">
												$ {{$delivery->delivery_fee}}
											</label>
										</div>
									</div>
									@php
										$deliveryFee = $delivery->delivery_fee;
									@endphp
								@endforeach
							</div>
						</div>
						<!------------------------End Delivery Informations--------------------------------->

						<!------------------------ Your Cart --------------------------------->
						<div class="col-md-6">
							<div class="row mb-5">
								<div class="col-md-12">
									<div class="p-3 p-lg-4 border bg-white">
										<h2 class="h3 mb-1 text-black">Your Cart</h2>
										<table class="table site-block-order-table mb-3">
											<thead>
												<th>Products</th>
												<th class="text-center">Size</th>
												<th class="text-center">Price</th>
												<th class="text-center">Quantity</th>
												<th class="text-end">Amount</th>
											</thead>
											<!--------------------- Cart product table --------------->
											<tbody>
												@php
													$subtotal = 0;
													$total = 0;
													$discount = 0;

												@endphp
												@foreach ($carts as $cart)
													@php
														//$subtotal += $cart->price * $cart->qty;
														//$productSizes = Sizes::where('id', $cart->options->size)->first();
														//--- Check if user is guest or sign in to display img from db ---//
														if(Auth::check() && Auth::user()->role == 1){
															$cartId = $cart->id;
															$productId = $cart->product_id;
															//$product = Products::where('id', $productId)->first();
															$size = Products_Sizes::where('size_id', $cart->size_id)->first();

															// Image
															$productImg = $cart->rela_product_cart->product_imgcover;
															// Name
															$productName = $cart->rela_product_cart->product_name;
															// Code
															$productCode = $cart->rela_product_cart->product_code;
															// Size
															$productSize = $size->rela_product_size->size_number;
															// Quantity
															$quantity = $cart->product_quantity;
															//price
															$price =  $cart->rela_product_cart->product_saleprice;
															$subtotal += $price * $quantity;

														}else{
															$cartId = $cart->id;
															$productId = $cart->id; // becoz in Cart model, column id is product_id
															$product = Products::where('id', $cartId)->first();
															$sizeId = $cart->options->has('size') ? $cart->options->size : '';
															$size = Products_Sizes::where('size_id', $sizeId)->first();

															// Image
															$productImg = $cart->options->has('image') ? $cart->options->image : '';
															// Name
															$productName = $cart->name;
															// Code
															$productCode =  $product->product_code;
															// Size ==>Get size_id from Cart:: in colum options
															$productSize = $size->rela_product_size->size_number;
															//$productSize->rela_product_size->size_number
															// Quantity
															$quantity = $cart->qty;
															// Price
															$price = $cart->price;
															$subtotal += $price * $quantity;
														}
													@endphp
													<tr>
														<td class="border-bottom-0">
															{{$productName}}
														</td>
														<td class="text-center border-bottom-0">
															<strong class="text-danger">{{$productSize}}</strong>
														</td>
														<td class="text-center border-bottom-0">
															<strong class="text-danger">$ {{number_format($price ,2)}}</strong>
														</td>
														<td class="text-center border-bottom-0">
															<strong class="text-danger">x {{$quantity}}</strong>
														</td>
														<td class="text-end border-bottom-0">
															$ {{number_format($price * $quantity, 2)}}
														</td>
													</tr>
												@endforeach
											</tbody>
											<!---------------------End Cart product table --------------->

											<!---------------------Toal table --------------------------->
											<tbody>
													<tr>
														<td class="text-black font-weight-bold border-bottom-0 ">
															<strong>Subtotal</strong>
														</td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="text-black text-end border-bottom-0">
															<strong>$ {{number_format($subtotal, 2)}}</strong>
														</td>
													</tr>
													<tr>
														<td class="text-black font-weight-bold border-bottom-0">
															<strong>Discount</strong>
														</td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="text-black text-end font-weight-bold border-bottom-0">
															<strong>$ {{number_format($discount, 2)}}</strong>
														</td>
													</tr>
													<tr>
														<td class="text-black font-weight-bold">
															<strong>Deliver Fee</strong>
														</td>
														<td></td>
														<td></td>
														<td></td>
														<td class="text-black text-end font-weight-bold">
															<strong>$ {{$deliveryFee}}</strong>
														</td>
													</tr>
													<tr>
														<td class="text-black h6  border-bottom-0">
															<strong>Total Amount</strong>
														</td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="text-danger text-end h5 border-bottom-0">
															<strong>
																$ {{$total  = number_format((($subtotal + $deliveryFee) - $discount) ,2)}}
															</strong>
														</td>
													</tr>

											</tbody>
										</table>
										<!--------------------- End Toal table --------------------------->

										<!--------------------- Payment Method --------------------------->
										<h2 class="h3 mb-3 text-black">Payment Method</h2>
										<div class="border p-3 mb-3">
											<div class="form-check ">
												<input
													class="form-check-input big-radio me-2"
													type="radio"
													name="payment"
													value="cash"
													id="flexRadioDefault1"
													checked
												>
												<label class="form-check-label" for="flexRadioDefault1">
													<h3 class="h6 mb-0 mt-1">
														<a
															class="d-block"
															data-bs-toggle="collapse"
															href="#collapsebank"
															role="button"
															aria-expanded="false"
															aria-controls="collapsebank"
															>
															Pay by Cash
														</a>
													</h3>
												</label>
											</div>
											<div class="collapse" id="collapsebank">
												<div class="py-2">
												<p class="mb-0">Get product then pay money.</p>
												</div>
											</div>
										</div>

										<div class="border p-3 mb-3">
											<div class="form-check">
												<input
													class="form-check-input big-radio me-2"
													type="radio"
													name="payment"
													value="bank"
													id="flexRadioDefault2"
												>
												<label class="form-check-label" for="flexRadioDefault2">
													<h3 class="h6 mb-0 mt-1">
														<a
															class="d-block"
															data-bs-toggle="collapse"
															href="#collapsecheque"
															role="button"
															aria-expanded="false"
															aria-controls="collapsecheque"
															>
															Pay by Bank Transfer
														</a>
													</h3>
												</label>
											</div>
											<div class="collapse" id="collapsecheque">
												<div class="py-2">
													<p class="mb-0">Customer please transfer to bank acount below :</p>
													<p class="mb-0">Bank: <strong class="text-danger">Agribank</strong></p>
													<p class="mb-0">Account: <strong class="text-danger">1303206422785</strong></p>
													<p class="mb-0">Account's name: <strong class="text-danger">LY PONLEU</strong></p>
													<p class="mb-0">Remark: <strong class="text-danger">Customer's name + Orders code</strong></p>
												</div>
											</div>
										</div>
										<!---------------------End Payment Method --------------------------->

										<div class="row ">
											<div class="col-md-6">
												<a
													href="{{url('cart')}}"
													class="btn btn-block px-4 py-2 fw-semibold  rounded-0"
													>
													Back
												</a>
											</div>
											<div class="col-md-6 d-flex justify-content-end">
												<button
													type="submit"
													class="btn btn-block px-4 py-2 fw-semibold  rounded-0"
													>
													Place Order
												</button>
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
						<!------------------------ Your Cart --------------------------------->
					</div>
				</form>
		      	<!---------------------- End </form> ---------------->
				<!---/// onclick="location.href='{{ url('thankyou') }}'" ///-->
		    </div>
		</div>

@endsection()