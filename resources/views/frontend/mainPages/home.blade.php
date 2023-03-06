@extends('index')
@section('content')
        <!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Stylish<span clsas="d-block"> Comfortable Quality</span></h1>
								<p class="mb-4">Bring you the most stylish and newest shoes.
									For young generation who are passionated with modern and diverse styles.</p>
								<p>
									<a href="{{url('shop')}}" class="btn btn-secondary me-2 rounded-pill px-4 py-2 fw-semibold">Shop Now</a>
									<!--<a href="#" class="btn btn-white-outline rounded-pill px-4 py-2 fw-semibold">Tìm hiểu thêm</a>-->
								</p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="frontend/images/sneaker.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-2">
					<div class="col-md-6 mx-auto text-center">
						<h2 class="section-title">PRODUCT CATEGORIES</h2>
					</div>
				</div>

				<div class="row">
					@foreach ($categories as $category)
						<div class="col-12 col-sm-6 col-md-4 mb-2 mb-md-0">
							<div class="post-entry">
								<a href="{{url('product-category/'.strtolower($category->category_name))}}"
									class="post-thumbnail">
									<img
										src="/product_img/imgcategory/{{$category->category_img}}"
										alt="Image" class="img-fluid category-img "
									>
								</a>
								<div class="post-content-entry">
									<h3>
										<a href="#">{{$category->category_name}}</a>
									</h3>
									<div class="meta">
										<span><a href="#">New Arrivals | </a></span>
										<span><a href="#">Best Seller</a></span>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- End Blog Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">
					<!-- Start Column 1 -->
					<div class="col-md-6 mb-4 mx-auto text-center">
						<h2 class="section-title">NEW ARRIVAL</h2>
					</div>
					<!-- End Column 1 -->
				</div>
				<div class="row">
					@foreach ($newProducts as $product)
						<!-- Start Column 2 -->
						<div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0 ">
							<a
								class="product-item"
								href="{{url('product-detail/'.$product->product_code)}}"
							>
								<img
									src="/product_img/imgcover/{{$product->product_imgcover}}"
									class="img-fluid product-thumbnail"
								>
								<h3 class="product-title">{{$product->product_name}}</h3>
								<strong class="product-price">
									$ {{floatval($product->product_saleprice)}}
								</strong>
								<span class="icon-cross">
									<img src="frontend/images/cross.svg" class="img-fluid">
								</span>
							</a>
						</div>
						<!-- End Column 2 -->
					@endforeach
				</div>
				<div class="row mt-4">
					<div class="d-flex justify-content-end">
						<!--- To show data by pagination --->
						{{$newProducts->links()}}
                	</div>
				</div>
			</div>
		</div>

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">NEWS & INTRODUCING </h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-5 mx-auto">
											<div class="testimonial-block text-center">
												<div class="author-info">
													<div class="author-pic">
														<img src="/frontend/images/Giay_2.jpeg" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">URBAS CORLURAY PACK</h3>
												</div>
												<blockquote class="mb-5">
													<p>&ldquo;Urbas Corluray Pack đem đến lựa chọn “làm mới mình” với sự kết hợp 5 gam màu mang sắc thu; phù hợp với những người trẻ năng động, mong muốn thể...&rdquo;</p>
												</blockquote>
											</div>
										</div>
									</div>
								</div>
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-5 mx-auto">
											<div class="testimonial-block text-center">
												<div class="author-info">
													<div class="author-pic">
														<img src="/frontend/images/Giay_2.jpeg" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">URBAS CORLURAY PACK</h3>
												</div>
												<blockquote class="mb-5">
													<p>&ldquo;Urbas Corluray Pack đem đến lựa chọn “làm mới mình” với sự kết hợp 5 gam màu mang sắc thu; phù hợp với những người trẻ năng động, mong muốn thể...&rdquo;</p>
												</blockquote>
											</div>
										</div>
									</div>
								</div>
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-5 mx-auto">
											<div class="testimonial-block text-center">
												<div class="author-info">
													<div class="author-pic">
														<img src="/frontend/images/Giay_2.jpeg" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">URBAS CORLURAY PACK</h3>
												</div>
												<blockquote class="mb-5">
													<p>&ldquo;Urbas Corluray Pack đem đến lựa chọn “làm mới mình” với sự kết hợp 5 gam màu mang sắc thu; phù hợp với những người trẻ năng động, mong muốn thể...&rdquo;</p>
												</blockquote>
											</div>
										</div>
									</div>
								</div>
								<!-- END item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->
@endsection()