<?php
	use App\Models\Sizes;
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
			<li class="breadcrumb-item ">
				<a href="{{url("cart")}}" class="text-light">Cart</a>
			</li>
		  	<li class="breadcrumb-item text-light">Checkout</li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->
	<div class="untree_co-section">

			<div class="container">
				<div class="row mb-3">
					<div class="col-md-12">
						<div class="border p-3 rounded-0" role="alert">
							Have an account? <a href="#">Click here</a> to log in.
						</div>
					</div>
				</div>
				<hr>
		      	<div class="row">
					<div class="col-md-6 mb-5 mb-md-0">
						<div class="p-3 p-lg-4 border bg-white">
							<h2 class="h3 mb-3 text-black">Delivery Informations</h2>
							<div class="form-group row">
								<div class="col-md-12">
									<label for="c_fname" class="text-black">Customer Name <span class="text-danger">*</span></label>
									<input
										type="text"
										class="form-control rounded-0"
										id="c_fname"
										name="c_fname"
										placeholder="Full Name"
										required
									>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-12">
									<label for="c_phone" class="text-black">Phone Number <span class="text-danger">*</span></label>
									<input
										type="text"
										class="form-control rounded-0"
										id="c_phone"
										name="c_phone"
										placeholder="Phone Number"
										required
									>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-12">
									<label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
									<input
									type="text"
									class="form-control rounded-0"
									id="c_email_address"
									name="c_email_address"
									placeholder="Example@gmail.com"
									required
									>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-12">
									<label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
									<input
										type="text"
										class="form-control rounded-0"
										id="c_address"
										name="c_address"
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
							<div class="form-group">
								<label for="c_order_notes" class="text-black">Comment</label>
								<textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control rounded-0" placeholder="Write comment here..."></textarea>
							</div>

						</div>
					</div>
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
											<th class="text-center">Quantity</th>
											<th class="text-end">Total Price</th>
										</thead>
										<tbody>
											@php
												$subtotal = 0;
												$total = 0;
												$discount = 0;
											@endphp
											@foreach ($carts as $cart)
												@php
													$subtotal += $cart->price * $cart->qty;
													$productSizes = Sizes::where('id', $cart->options->size)->first();
												@endphp
												<tr>
													<td class="border-bottom-0">
														{{$cart->name}}
													</td>
													<td class="text-center border-bottom-0">
														<strong class="text-danger">{{$productSizes->size_number}}</strong>
													</td>
													<td class="text-center border-bottom-0">
														<strong class="text-danger">x {{$cart->qty}}</strong>
													</td>
													<td class="text-end border-bottom-0">
														{{$cart->price * $cart->qty}} $
													</td>
												</tr>
											@endforeach
										</tbody>
										<tbody>
												<tr>
													<td class="text-black font-weight-bold border-bottom-0 "><strong>Subtotal</strong></td>
													<td class="border-bottom-0"></td>
													<td class="border-bottom-0"></td>
													<td class="text-black text-end border-bottom-0"><strong>{{$subtotal}} $</strong></td>
												</tr>
												<tr>
													<td class="text-black font-weight-bold border-bottom-0"><strong>Discount</strong></td>
													<td class="border-bottom-0"></td>
													<td class="border-bottom-0"></td>
													<td class="text-black text-end font-weight-bold border-bottom-0"><strong>{{$discount}} $</strong></td>
												</tr>
												<tr>
													<td class="text-black font-weight-bold"><strong>Estimated Shipping</strong></td>
													<td></td>
													<td></td>
													<td class="text-black text-end font-weight-bold"><strong>0 $</strong></td>
												</tr>
												<tr>
													<td class="text-black h6  border-bottom-0"><strong>Total</strong></td>
													<td class="border-bottom-0"></td>
													<td class="border-bottom-0"></td>
													<td class="text-danger text-end h6  border-bottom-0"><strong>{{$total = $subtotal - $discount}} $</strong></td>
												</tr>

										</tbody>
									</table>

									<h2 class="h3 mb-3 text-black">Payment Method</h2>
									<div class="border p-3 mb-3">
										<div class="form-check ">
											<input class="form-check-input big-radio me-2" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
											<label class="form-check-label" for="flexRadioDefault1">
												<h3 class="h6 mb-0">
													<a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">
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
											<input class="form-check-input big-radio me-2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
											<label class="form-check-label" for="flexRadioDefault2">
												<h3 class="h6 mb-0">
													<a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">
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

									<div class="d-grid">
										<button
											type="submit"
											class="btn btn-block px-4 py-3 fw-semibold  rounded-0"
											onclick="location.href='{{ url('thankyou') }}'">
											Place Order
										</button>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		      </div>
		      <!-- </form> -->
		    </div>
		  </div>
@endsection()