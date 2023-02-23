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
		    <div class="row mb-3">
		        <div class="col-md-12">
		          	<div class="border p-3 rounded-0" role="alert">
		            	Have an account? <a href="#">Click here</a> to log in.
		        	</div>
		    	</div>
			</div>
			<hr>
			<div class="row">
				<!--------------------Start Cart section------------------------->
		        <div class="col-md-8 mb-5 mb-md-0 mt-3">
					@if(session('cart'))
						@foreach (session('cart') as $id => $details)
							<div class="row form-group">
								<div class="col-md-2">
									<img
										src="/product_img/imgcover/{{$details['product_imgcover']}}"
										class="img-fluid product-thumbnail"
									>
								</div>
								<div class="col-md-7 d-grid">
									<div class="row">
										<h5 class="text-dark">{{$details['product_name']}}</h5>
									</div>
									<div class="row">
										<p>Women & Men</p>
									</div>
									<div class="row mt-auto">
										<div class="col-md-3 ">
											<select class="form-select form-control rounded-0" aria-label="Default select example" >
												<option value="product-siz" selected>35</option>
												<option value="product-siz">36</option>
												<option value="product-siz">37</option>
												<option value="product-siz">38</option>
												<option value="product-siz">39</option>
												<option value="product-siz">40</option>
												<option value="product-siz">41</option>
												<option value="product-siz">42</option>
												<option value="product-siz">43</option>
												<option value="product-siz">44</option>
												<option value="product-siz">45</option>
											</select>
										</div>
										<div class="col-md-3 ">
											<div class="cinput-group quantity-container ">
												<input
													type="number"
													class="form-control quantity-amount rounded-0"
													value="{{$details['quantity']}}" max="5" min="1"
													placeholder=""
													aria-label="Example text with button addon"
													aria-describedby="button-addon1"
												>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-3 d-grid">
									<div class="row text-end">
										<h5 class="text-dark fw-bold">${{floatval($details['product_saleprice'])}}</h5>
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
											<a href="#" class="btn btn-danger btn-sm rounded-0" role="button">Remove</a>
										</div>
									</div>
								</div>
							</div>
							<hr>
						@endforeach
					@endif
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
												<strong>22 $</strong>
											</td>
										</tr>
										<tr>
											<td class="text-black font-weight-bold border-bottom-1">
												<strong>Discount</strong>
											</td>
											<td class="text-black text-end font-weight-bold border-bottom-1">
												<strong>0 $</strong>
											</td>
										</tr>
										<tr>
											<td class="text-black h6 fw-bold border-bottom-0">
												<strong>Total</strong>
											</td>
											<td class="text-danger text-end h6 fw-bold border-bottom-0">
												<strong>22 $</strong>
											</td>
										</tr>
									</tbody>
								</table>

								<div class="d-grid">
									<button
										class="btn btn-block px-4 py-2 fw-semibold rounded-0"
										onclick="location.href='{{ url('checkout') }}'"
										>
										CHECKOUT
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="row mb-5">
					<div class="col-md-6 mb-3 mb-md-0">
						<button
							class="btn btn-black btn-sm btn-block rounded-0 px-5 py-2 fw-semibold"
							>
							Remve all
						</button>
					</div>
					<div class="col-md-6">
						<button
							class="btn btn-outline-black btn-sm btn-block rounded-0 px-5 py-2 fw-semibold"
							>
							Continue shopping
						</button>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection()