<?php
	use App\Models\Products_Sizes;
	use App\Models\Products_Imgreviews;
	use App\Models\Likes;

?>
@extends('index')
@section('content')
    <!-- Start breabcrumb Section -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
            <li class="breadcrumb-item ">
                @foreach ( $productGroups as $group)
                    <a
                        href="{{url('product-'.strtolower($group->rela_product_group->group_name))}}"
                        class="text-light"
                        >
                        {{$group->rela_product_group->group_name}}
                    </a>
                    {{($loop->last)? '': '-'}}
                @endforeach
            </li>
		    <li class="breadcrumb-item ">
                <a
                    href="{{url('product-category/'.strtolower($productAttribute->rela_product_category->category_name))}}"
                    class="text-light"
                    >
                    {{$productAttribute->rela_product_category->category_name}}
                </a>
            </li>
		    <li class="breadcrumb-item">
                <a
                    href="{{url("product-subcategory/". strtolower($productAttribute->rela_product_subcategory->sub_category))}}"
                    class="text-light"
                    >
                    {{$productAttribute->rela_product_subcategory->sub_category}}
                </a>
            </li>
		    <li class="breadcrumb-item text-light active" aria-current="page">
                {{$productDetails->product_name}}
            </li>
		</ol>
	</nav>
	<!-- End breabcrumb Section -->

    <div class="untree_co-section">
		<div class="container">
            @if(Session::has('alert'))
                <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
                    {{Session::get('alert')}}
                    <a href="{{url('login')}}" class="alert-link">  Click here </a> to sign in.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif

		    <!--------------Start </form> ---------------------->
            <form action="{{url('add-to-cart/'.$productDetails->id)}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- to make form active -->
                <div class="row">
                    <!-- Start first colume section -->
                    <div class="col-md-6 mb-5 mb-md-0">
						<div class="img-container">
                            <img
                                src="/product_img/imgcover/{{$productDetails->product_imgcover}}"
                                class="img-fluid product-thumbnail {{($stockLeft == 0)? 'opacity-50':''}}"
                            >
                            @if($productDetails->product_status == 1)
								<h6 class="text-new bg-danger">New Arrival</h6>
								@elseif($productDetails->product_price > $productDetails->product_saleprice)
									<h6 class="text-new bg-black">Sale Off</h6>

							@endif
                            @if($stockLeft == 0)
								<h4 class="text-sold-out bg-secondary">Sold Out</h4>
                            @endif
						</div>
                        <div class="container px-0">
                            <div class="row">
                                @php
                                    $imgreviews = Products_Imgreviews::where('product_id', $productDetails->id)->get();
                                @endphp
                                @foreach ($imgreviews as $imgreview)
                                    <div class="col-sm py-3">
                                        <img
                                            src="/product_img/imgreview/{{$imgreview->product_imgreview}}"
                                            class="img-fluid product-thumbnail"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End first colume section -->

                    <!-- End second colume section -->
                    <div class="col-md-6">
                        <div class="row mb-2 ms-4">
                            <div class="col-md-12">
                                <h3 class="mb-2 text-black fw-bold">{{$productDetails->product_name}}</h3>
                                <p class="text-black py-1 my-0">
                                    @foreach ($productGroups as $group)
                                        {{$group->rela_product_group->group_name}}
                                        {{($loop->last)? '':'&'}}
                                    @endforeach
                                </p>
                                <!--------------------- Price ------------------------>
                                <div class="row d-flex align-items-baseline">
                                    @if($productDetails->product_price > $productDetails->product_saleprice)
                                        <div class="col-4 ">
                                            <h5 class="text-danger fw-bold py-2">
                                                $ {{number_format($productDetails->product_saleprice, 2)}}
                                            </h5>
                                        </div>
                                        <div class="col-4">
                                            <p class="fw-bold">
                                                <del>$ {{number_format($productDetails->product_price, 2)}}</del>
                                            </p>
                                        </div>
                                        @else
                                            <div class="col-4">
                                                <h5 class="text-danger fw-bold py-2">
                                                    $ {{number_format($productDetails->product_saleprice, 2)}}
                                                </h5>
                                            </div>
                                    @endif
                                </div>
                                <!---------------------End Price ------------------------>

                                <!--------------------- Color ------------------------>
                                <hr>
                                <div class="row py-2 px-2">
                                    <div class="col-md-1">
                                        <a href="{{url('product-detail/'.$productDetails->product_code)}}">
                                            <span
                                                class="product-color"
                                                style="background-color:{{$productDetails->product_color}};"
                                                >
                                            </span>
                                        </a>
                                    </div>

                                    @foreach ($productCode as $row)
                                        @if($row->product_code == $productDetails->product_code)
                                            @continue
                                            @else
                                                <div class="col-md-1">
                                                    <a
                                                        href="{{url('product-detail/'.$row->product_code)}}"
                                                        style="color:{{$row->product_color}}"
                                                        >
                                                        <span
                                                            class="product-color"
                                                            style="background-color:{{$row->product_color}};">
                                                        </span>
                                                    </a>
                                                </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!--------------------End  Color ------------------------>

                                <!-------------------- Size and Quantity------------------------>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-2 text-black fw-bold py-2">SIZE</h6>
                                        <select
                                            class="form-select form-control bg-transparent rounded-0"
                                            aria-label="Default select example"
                                            name="size_id"
                                            required
                                            >
                                            <option selected disabled value="">choose size</option>
                                            @foreach ($productSizes as $size)
                                                @php
                                                    $quantity = Products_Sizes::where('product_id',  $productDetails->id)
                                                        ->where('size_id', $size->size_id)->first();
                                                @endphp
                                                <option class="{{($quantity->size_quantity == 0)? 'text-danger' : ''}}"
                                                    value="{{$size->size_id}}"
                                                    {{($quantity->size_quantity == 0)? 'disabled':''}}
                                                    >
                                                    {{$size->rela_product_size->size_number}}
                                                    {{($quantity->size_quantity == 0)? '(Out of stock)':''}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="mb-2 text-black fw-bold py-2">Quantity</h6>
                                        <div class="form-outline">
                                            <input
                                                class="form-control bg-transparent rounded-0"
                                                type="number"
                                                name="product_quantity"
                                                id="quantity"
                                                value="" max="5" min="1"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                                <!--------------------End  Size and Quantity------------------------>

                                <!-------------------- Start add to cart / like / buy now --------------->
                                <div class="row my-4">
                                        <div class="col-md-10">
                                            <div class="d-grid">
                                                <button
                                                    type="submit"
                                                    name="action"
                                                    value="addtocart"
                                                    class="btn btn-block py-3 fw-semibold cart-add  rounded-0">
                                                    ADD TO CART
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="d-grid">
                                                @php
                                                    if(Auth::check() && Auth::user()->role == 1){
                                                        $userId = Auth::user()->id;
                                                        $isLiked = Likes::where('product_id', $productDetails->id)->where('user_id',  $userId)->first();

                                                    }else{
                                                        $userId = 0;
                                                        $isLiked = 0;
                                                    }
                                                @endphp
                                                @if($isLiked)
                                                    <a
                                                        href="{{url('add-like/'.$productDetails->id.'/'.$userId)}}"
                                                        class="btn btn-outline-danger px-4 py-2 rounded-0"
                                                        >
                                                        <span class="material-icons-outlined py-2">favorite</span>
                                                    </a>
                                                @elseif($isLiked == 0)
                                                    <a
                                                        href="{{url('add-like/'.$productDetails->id.'/'.$userId)}}"
                                                        class="btn btn-outline-danger px-4 py-2 rounded-0 cart-add"
                                                        >
                                                        <span class="material-icons-outlined py-2">favorite</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                                <div class="row my-4">
                                    <div class="d-grid">
                                        <button
                                            type="submit"
                                            name="action"
                                            value="buynow"
                                            class="btn btn-block px-4 py-3 fw-semibold  rounded-0"
                                            >
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------- End add to cart / like / buy now --------------->

                        <div class="row ms-4">
                            <div class="col-md-12">
                                <div class="border p-3 mb-3">
                                    <div class="form-check px-5">
                                            <h6 class="mb-0">
                                                <a
                                                    class="d-block"
                                                    data-bs-toggle="collapse"
                                                    href="#collapsebank1"
                                                    role="button"
                                                    aria-expanded="false"
                                                    aria-controls="collapsebank"
                                                    >
                                                    View Product Details
                                                </a>
                                            </h6>
                                    </div>
                                    <div class="collapse" id="collapsebank1">
                                        <div class="px-5">
                                            <p>{!! $productDetails->product_des !!}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border p-3 mb-3">
                                    <div class="form-check px-5">
                                            <h6 class="mb-0">
                                                <a
                                                    class="d-block"
                                                    data-bs-toggle="collapse"
                                                    href="#collapsebank2"
                                                    role="button"
                                                    aria-expanded="false"
                                                    aria-controls="collapsebank"
                                                    >
                                                    Size Chart Introduction
                                                </a>
                                            </h6>
                                    </div>
                                    <div class="collapse" id="collapsebank2">
                                        <div class="px-5 py-2">
                                            <img src="/frontend/images/Size-chart.jpg" class="img-fluid product-thumbnail">
                                        </div>
                                    </div>
                                </div>

                                <div class="border p-3 mb-3">
                                    <div class="form-check px-5">
                                            <h6 class="mb-0">
                                                <a class="d-block" data-bs-toggle="collapse" href="#collapsebank3" role="button" aria-expanded="false" aria-controls="collapsebank">
                                                    Free Delivery and Returns
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
                                                    Product Warranty
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
                    <!-- End second colume section -->
                </div>
            </form>
		    <!--------------End </form> ---------------------->
		</div>
    </div>
@endsection()