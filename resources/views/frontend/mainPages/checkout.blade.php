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
										<label for="cfname" class="text-black mb-1">Customer Name <span class="text-danger">*</span></label>
										<input
											type="text"
											class="form-control rounded-0"
											id="cname"
											name="cfname"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->name : ''}}"
											placeholder="Full Name"
											required
										>
									</div>
								</div>

								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="cphone" class="text-black mb-1">Phone Number <span class="text-danger">*</span></label>
										<input
											type="text"
											class="form-control rounded-0"
											id="cphone"
											name="cphone"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->phone : ''}}"
											placeholder="Phone Number"
											required
										>
									</div>
								</div>

								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="cemail" class="text-black mb-1">Email <span class="text-danger">*</span></label>
										<input
											type="email"
											class="form-control rounded-0"
											id="cemail"
											name="cemail"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->email : ''}}"
											placeholder="Example@gmail.com"
											required
										>
									</div>
								</div>

								<div class="form-group row mb-3">
									<div class="col-md-12">
										<label for="caddress" class="text-black mb-1">Address <span class="text-danger">*</span></label>
										<input
											type="text"
											class="form-control rounded-0"
											id="caddress"
											name="caddress"
											value="{{(Auth::check() && Auth::user()->role == 1)? Auth::user()->address: ''}}"
											placeholder="House number, City ...."
											required
										>
									</div>
								</div>
								<!--
								<div class="form-group">
									<label for="c_city" class="text-black">City <span class="text-danger">*</span></label>
									<select id="c_city" class="form-control  rounded-0">
									<option value="1">chọn tỉnh / thành phố</option>
									<option value="2">bangladesh</option>
									<option value="3">Algeria</option>
									<option value="4">Afghanistan</option>
									<option value="5">Ghana</option>
									<option value="6">Albania</option>
									<option value="7">Bahrain</option>
									<option value="8">Colombia</option>
									<option value="9">Dominican Republic</option>
									</select>
								</div>
								<div class="form-group row">
								<div class="col-md-6">
									<label for="c_commune" class="text-black ">Quận / Huyện <span class="text-danger">*</span></label>
									<select id="c_commune" class="form-control rounded-0">
										<option value="1">chọn quận / huyện</option>
										<option value="2">bangladesh</option>
										<option value="3">Algeria</option>
										<option value="4">Afghanistan</option>
										<option value="5">Ghana</option>
										<option value="6">Albania</option>
										<option value="7">Bahrain</option>
										<option value="8">Colombia</option>
										<option value="9">Dominican Republic</option>
									</select>
								</div>
								<div class="col-md-6">
									<label for="c_village" class="text-black ">Phường / Xã <span class="text-danger">*</span></label>
									<select id="c_village" class="form-control rounded-0">
										<option value="1">chọn phường / xã</option>
										<option value="2">bangladesh</option>
										<option value="3">Algeria</option>
										<option value="4">Afghanistan</option>
										<option value="5">Ghana</option>
										<option value="6">Albania</option>
										<option value="7">Bahrain</option>
										<option value="8">Colombia</option>
										<option value="9">Dominican Republic</option>
									</select>
								</div>
								</div>
								-->
								<div class="form-group mb-3">
									<label for="cnote" class="text-black mb-1">Order Note</label>
									<textarea name="cnote" id="cnote" cols="30" rows="5" class="form-control rounded-0" placeholder="Write here..."></textarea>
								</div>
							</div>
						</div>
						<!------------------------End Delivery Informations--------------------------------->

						<!------------------------ Your Cart --------------------------------->
						<div class="col-md-6">
							<!--
							<div class="row mb-5">
								<div class="col-md-12">
									<h2 class="h3 mb-3 text-black">MÃ KHUYẾN MÃI</h2>
									<div class="p-3 p-lg-5 border bg-white">
									<div class="input-group w-85">
										<input type="text" class="form-control py-2 rounded-0" id="coupon" placeholder="nhập mã" aria-label="nhập mã" aria-describedby="button-addon2">
										<button class="btn btn-outline-secondary px-3 fw-semibold  rounded-0" type="button" id="button-addon2">ÁP DỤNG</button>
									</div>
									</div>
								</div>
							</div>
							-->

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
													$Shipping = 0;
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
															<strong class="text-danger">{{floatval($price)}} $</strong>
														</td>
														<td class="text-center border-bottom-0">
															<strong class="text-danger">x {{$quantity}}</strong>
														</td>
														<td class="text-end border-bottom-0">
															{{$price * $quantity}} $
														</td>
													</tr>
												@endforeach
											</tbody>
											<!---------------------End Cart product table --------------->

											<!---------------------Toal table --------------------------->
											<tbody>
													<tr>
														<td class="text-black font-weight-bold border-bottom-0 "><strong>Subtotal</strong></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="text-black text-end border-bottom-0"><strong>{{$subtotal}} $</strong></td>
													</tr>
													<tr>
														<td class="text-black font-weight-bold border-bottom-0"><strong>Discount</strong></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="text-black text-end font-weight-bold border-bottom-0"><strong>{{$discount}} $</strong></td>
													</tr>
													<tr>
														<td class="text-black font-weight-bold"><strong>Estimated Shipping</strong></td>
														<td></td>
														<td></td>
														<td></td>
														<td class="text-black text-end font-weight-bold"><strong>0 $</strong></td>
													</tr>
													<tr>
														<td class="text-black h6  border-bottom-0"><strong>Total</strong></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="border-bottom-0"></td>
														<td class="text-danger text-end h5 border-bottom-0">
															<strong>{{$total = $subtotal - $discount - $Shipping}} $</strong>
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
													<h3 class="h6 mb-0">
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
													<h3 class="h6 mb-0">
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