        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="{{url('home')}}">MotBuoc<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 me-4">
						<li class="nav-item {{Request::is('shop')? 'active':''}}">
                            <a class="nav-link" href="{{url('shop')}}"
								>
								<h5><strong>SẢN PHẨM</strong></h5>
							</a>
							
                        </li>
						<li class="nav-item ms-0 me-0">
                            <h6 class="nav-link text-black-50">|</h6>
						</li>	
						<li class="nav-item {{Request::is('services')? 'active':''}}">
                            <a class="nav-link" href="{{url('services')}}"><h5><strong>NAM</strong></h5></a>
                        </li>
						<li class="nav-item ms-0 me-0">
                            <h6 class="nav-link text-black-50">|</h6>
						</li>
						<li class="nav-item {{Request::is('blog')? 'active':''}}">
                            <a class="nav-link" href="{{url('blog')}}"><h5><strong>NỮ</strong></h5></a>
                        </li>
						<!--
						<li class="nav-item {{Request::is('about')? 'active':''}}">
                            <a class="nav-link" href="{{url('about')}}">DANH MỤC</a>
                        </li>
						<li class="nav-item {{Request::is('contact')? 'active':''}}">
                            <a class="nav-link" href="{{url('contact')}}">LIÊN HỆ</a>
                        </li>
					-->
						<li class="nav-item {{Request::is('shop')? 'active':''}}">
							<div class="dropdown position-static">
								<a class="nav-link" href="{{url('/shop')}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<h5><strong>Dropdown</strong></h5>
								</a>
								<div class="dropdown-menu w-100">
									<div class="container">
										<div class="row w-100">
											<div class="col-12 col-md-4">
												<a class="dropdown-item " href="{{url('services')}}"><img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail"></a>
											</div>
											<div class="col-12 col-md-4">
												<a class="dropdown-item " href="#"><img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail"></a>
											</div>
											<div class="col-12 col-md-4">
												<a class="dropdown-item " href="#"><img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						
					</ul>
					
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-4 me-4">
						<li class="nav-item me-0 ">
							<a class="nav-link" href="{{url('cart')}}">
								<span class="material-icons-outlined {{Request::is('cart')? 'active':''}}">favorite</span>
							</a>
						</li>
						<li class="nav-item">
                            <a class="nav-link" href="{{url('cart')}}">
								<span class="material-icons-outlined {{Request::is('cart')? 'active':''}}">shopping_cart</span>
							</a>
                        </li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('profile')}}">
								<span class="material-icons-round {{Request::is('profile')? 'active':''}}">person</span>
							</a>
						</li>
						
					</ul>
					<form class="d-flex col-lg-3 ms-5">
						<input class="form-control ds-input me-2 ms-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
					</form>
				</div>
			</div>
		</nav>
		