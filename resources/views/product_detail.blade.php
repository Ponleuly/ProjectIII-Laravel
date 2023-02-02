
@extends('index')
@section('content') 
    <!-- Start breabcrumb Section -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
		  <li class="breadcrumb-item "><a href="{{url("home")}}" class="text-light">Trang chủ</a></li>
		  <li class="breadcrumb-item "><a href="{{url("shop")}}" class="text-light">Sản phẩm</a></li>
		  <li class="breadcrumb-item text-light active" aria-current="page">Ananas Vintas 2023</li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->

    <div class="untree_co-section">
		    <div class="container">
		      <div class="row">
                <!-- Start first colume section -->
		        <div class="col-md-6 mb-5 mb-md-0">
					<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                    <div class="container px-0">
                         <div class="row">
                            <div class="col-sm py-3">
                                <img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                            </div>
                            <div class="col-sm py-3">
                                <img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                            </div>
                            <div class="col-sm py-3">
                                <img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                            </div>
                            <div class="col-sm py-3">
                                <img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                            </div>
                        </div>
                    </div>
		        </div>
                <!-- End first colume section -->

                <!-- End second colume section -->
		        <div class="col-md-6">
		          <div class="row mb-5 ms-4">
		            <div class="col-md-12">
						<h3 class="mb-2 text-black">Vanss Sneaker</h3>
						<p class="text-black py-1 my-0">Sản phẩm: <strong>Nam</strong></p>
                        <h5 class="text-danger fw-bold py-2 border-bottom-2"><strong>700.000 VND</strong></h5>
					  </div>
		          </div>

		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">THANH TOÁN</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Đơn hàng</th>
		                    <th class="text-end">Tổng tiền</th>
		                  </thead>
		                  <tbody>
		                    <tr>
		                      <td class="border-bottom-0">Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
		                      <td class="text-end border-bottom-0">400.000 VND</td>
		                    </tr>
		                    <tr>
		                      <td>Polo Shirt <strong class="mx-2">x</strong>   1</td>
		                      <td class="text-end">400.000 VND</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold border-bottom-0"><strong>Đơn hàng</strong></td>
		                      <td class="text-black text-end border-bottom-0"><strong>800.000 VND</strong></td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold border-bottom-0"><strong>Giảm</strong></td>
		                      <td class="text-black text-end font-weight-bold border-bottom-0"><strong>100.000 VND</strong></td>
							</tr>
							<tr>
								<td class="text-black font-weight-bold"><strong>Phí vận chuyển</strong></td>
								<td class="text-black text-end font-weight-bold"><strong>0 VND</strong></td>
							</tr>
							<tr>
								<td class="text-black h6 fw-bold border-bottom-0"><strong>TỔNG CỘNG</strong></td>
								<td class="text-danger text-end h6 fw-bold border-bottom-0"><strong>700.000 VND</strong></td>
							</tr>
		                  </tbody>
		                </table>

		                <div class="border p-3 mb-3">
							<div class="form-check ">
								<input class="form-check-input big-radio me-2" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
								<label class="form-check-label" for="flexRadioDefault1">
									<h3 class="h6 mb-0">
										<a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">
											Thanh toán trực tiếp khi giao hàng
										</a>
									</h3>
								</label>
							</div>
		                  <div class="collapse" id="collapsebank">
		                    <div class="py-2">
		                      <p class="mb-0">Thanh toán khi nhận được hàng.</p>
		                    </div>
		                  </div>
		                </div>

		                <div class="border p-3 mb-3">
							<div class="form-check">
								<input class="form-check-input big-radio me-2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
								<label class="form-check-label" for="flexRadioDefault2">
									<h3 class="h6 mb-0">
										<a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">
											Thanh toán bằng chuyển khoản ngân hàng
										</a>
									</h3>
								</label>
							  </div>
		                  <div class="collapse" id="collapsecheque">
		                    <div class="py-2">
								<p class="mb-0">Khách hàng vui lòng chuyển khoản qua tài khoản ngân hàng dưới đây :</p>
								<p class="mb-0">Tên ngân hàng: <strong class="text-danger">Agribank</strong></p>
								<p class="mb-0">Số tài khoản: <strong class="text-danger">1303206422785</strong></p>
								<p class="mb-0">Chủ tài khoản: <strong class="text-danger">LY PONLEU</strong></p>
								<p class="mb-0">Nội dụng chuyển khoản: <strong class="text-danger">Tên khách hàng + Mã đặt hàng</strong></p>
		                    </div>
		                  </div>
		                </div>

						<div class="d-grid">
							<button class="btn btn-block px-4 py-3 fw-semibold" onclick="location.href='{{ url('thankyou') }}'">HOÀN TẤT ĐẶT HÀNG</button>
						</div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
                <!-- End second colume section -->
		      </div>
		      <!-- </form> -->
		    </div>
		  </div>
@endsection()