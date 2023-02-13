
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
                            <h3 class="mb-2 text-black fw-bold">Vanss Sneaker</h3>
                            <p class="text-black py-1 my-0">Sản phẩm: <strong>Nam</strong></p>
                            <h5 class="text-danger fw-bold py-2"><strong>700.000 VND</strong></h5>
                            <hr>
                            <div class="row py-2 px-3">
                                <span class="product-color" style="background-color:#CC2936;"><a href="" ></a></span>
                                <span class="product-color" style="background-color:#edc373;"><a href="" ></a></span>
                                <span class="product-color" style="background-color:#889bae;"><a href="" ></a></span>
                                <span class="product-color" style="background-color:#75a14f;"><a href="" ></a></span>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-2 text-black fw-bold py-2">SIZE</h5>
                                    <select class="form-select form-control bg-transparent rounded-0" aria-label="Default select example">
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
                                <div class="col-md-6">
                                    <h5 class="mb-2 text-black fw-bold py-2">SỐ LƯỢNG</h5>
                                    <div class="form-outline">
                                        <input class="form-control bg-transparent rounded-0" type="number" name="quantity" id="quantity" value="1" max="5" min="1">
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4">
                                    <div class="col-md-10">
                                        <div class="d-grid">
                                            <a href="" class="btn btn-block py-3 fw-semibold cart-add  rounded-0">THÊM VÀO GIỎ HÀNG</a>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="d-grid">
                                            <a href="" class="btn btn-block px-4 py-2 cart-add  rounded-0">
                                                <span class="material-icons-outlined py-2">favorite</span>
                                            </a>
                                        </div>
                                    </div>
                            </div>
                            <div class="row my-4">
                                <div class="d-grid">
                                    <a href="{{url('cart')}}" class="btn btn-block px-4 py-3 fw-semibold  rounded-0">MUA NGAY</a>
                                </div>
                            </div>
                        </div>
		            </div>

		            <div class="col-md-12">
                            <div class="border p-3 mb-3">
                                <div class="form-check px-5">
                                        <h6 class="mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapsebank1" role="button" aria-expanded="false" aria-controls="collapsebank">
                                                Thông tin sản phẩm
                                            </a>
                                        </h6>
                                </div>
                                <div class="collapse" id="collapsebank1">
                                    <div class="px-5">
                                        <p class="mb-0">Size run: 35 – 46</p>
                                        <p class="mb-0">Gender: Unisex</p>
                                        <p class="mb-0">Upper: Canvas NE</p>
                                        <p class="mb-0">Outsole: Rubber</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-3">
                                <div class="form-check px-5">
                                        <h6 class="mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapsebank2" role="button" aria-expanded="false" aria-controls="collapsebank">
                                                Hướng dẫn chọn size
                                            </a>
                                        </h6>
                                </div>
                                <div class="collapse" id="collapsebank2">
                                    <div class="px-5 py-2">
                                        <img src="frontend/images/Size-chart.jpg" class="img-fluid product-thumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-3">
                                <div class="form-check px-5">
                                        <h6 class="mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapsebank3" role="button" aria-expanded="false" aria-controls="collapsebank">
                                                Quy định đổi sản phẩm
                                            </a>
                                        </h6>
                                </div>
                                <div class="collapse" id="collapsebank3">
                                    <div class="px-5">
                                        <ul>
                                            <li>Chỉ đổi hàng 1 lần duy nhất, mong bạn cân nhắc kĩ trước khi quyết định.</li>
                                            <li>Thời hạn đổi sản phẩm khi mua trực tiếp tại cửa hàng là 07 ngày, kể từ ngày mua. Đổi sản phẩm khi mua online là 14 ngày, kể từ ngày nhận hàng.</li>
                                            <li>Sản phẩm đổi phải kèm hóa đơn. Bắt buộc phải còn nguyên tem, hộp, nhãn mác.</li>
                                            <li>Sản phẩm đổi không có dấu hiệu đã qua sử dụng, không giặt tẩy, bám bẩn, biến dạng.</li>
                                            <li>Ananas chỉ ưu tiên hỗ trợ đổi size. Trong trường hợp sản phẩm hết size cần đổi, bạn có thể đổi sang 01 sản phẩm khác:
                                                <br>- Nếu sản phẩm muốn đổi ngang giá trị hoặc có giá trị cao hơn, bạn sẽ cần bù khoảng chênh lệch tại thời điểm đổi (nếu có).
                                                <br>- Nếu bạn mong muốn đổi sản phẩm có giá trị thấp hơn, chúng tôi sẽ không hoàn lại tiền.</li>
                                            <li>Trong trường hợp sản phẩm - size bạn muốn đổi không còn hàng trong hệ thống. Vui lòng chọn sản phẩm khác.</li>
                                            <li>Không hoàn trả bằng tiền mặt dù bất cứ trong trường hợp nào. Mong bạn thông cảm.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-3">
                                <div class="form-check px-5">
                                        <h6 class="mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapsebank4" role="button" aria-expanded="false" aria-controls="collapsebank">
                                                Bảo hành sản phẩm
                                            </a>
                                        </h6>
                                </div>
                                <div class="collapse" id="collapsebank4">
                                    <div class="px-5">
                                        <p class="mb-0">
                                            Mỗi đôi giày Ananas trước khi xuất xưởng đều trải qua nhiều khâu kiểm tra.
                                            Tuy vậy, trong quá trình sử dụng, nếu nhận thấy các lỗi: gãy đế, hở đế,
                                            đứt chỉ may,...trong thời gian 6 tháng từ ngày mua hàng,
                                            mong bạn sớm gửi sản phẩm về Ananas nhằm giúp chúng tôi có cơ hội phục vụ bạn tốt hơn.
                                            Vui lòng gửi sản phẩm về bất kỳ cửa hàng Ananas nào,
                                            hoặc gửi đến trung tâm bảo hành Ananas ngay trong trung tâm TP.HCM trong giờ hành chính:
                                            Địa chỉ: 170-172, Đinh Bộ Lĩnh, P.26 , Q.Bình Thạnh, TP.HCM
                                            Hotline: 028 2211 0067
                                        </p>
                                    </div>
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