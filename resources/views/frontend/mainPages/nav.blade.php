        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="{{url('home')}}">MotBuoc<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 me-4">
						<li class="nav-item {{Request::is('shop')? 'active':''}}">
							<!--
                            <a class="nav-link" href="{{url('shop')}}"
								>
								<h5><strong>SẢN PHẨM</strong></h5>
							</a>
							-->
						
							<div class="dropdown position-static">
								<a class="nav-link hover-bar" href="{{url('shop')}} {{Request::is('shop')? 'active':''}}">
									<h5><strong>SẢN PHẨM</strong></h5>
								</a>
								<!--
								<div class="dropdown-menu w-100">
									<div class="container">
										<div class="row w-100">
											<div class="col-12 col-md-4">
												<a class="dropdown-item " href="{{url('shop')}}">
													<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
													<h5 class="text-center text-black"><strong>CHO NAM</strong></h5>
												</a>
											</div>
											<div class="col-12 col-md-4">
												<a class="dropdown-item " href="{{url('shop')}}">
													<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
													<h5 class="text-center text-black"><strong>CHO NỮ</strong></h5>
												</a>
											</div>
											<div class="col-12 col-md-4">
												<a class="dropdown-item " href="{{url('shop')}}">
													<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
													<h5 class="text-center text-black"><strong>PHỤ KIỆN</strong></h5>
												</a>
											</div>
										</div>
									</div>
								</div>-->
							</div>
						
                        </li>
						<li class="nav-item ms-0 me-0">
                            <h6 class="nav-link text-black-50">|</h6>
						</li>	
						<li class="nav-item {{Request::is('men')? 'active':''}}">
                            <!--<a class="nav-link" href="{{url('men')}}"><h5><strong>NAM</strong></h5></a>-->
							<div class="dropdown position-static">
								<a class="nav-link hover-bar" href="{{url('men')}} {{Request::is('men')? 'active':''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<h5><strong>NAM</strong></h5>
								</a>
								<div class="dropdown-menu w-100">
									<div class="container">
										<div class="row w-100">
											<div class="col-12 col-md-4">
												<h5 class="text-center text-black py-4"><strong>NỔI BẬT</strong></h5>
												<div class="list-group list-group-light text-center">
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0">
														<h6>Tất cả sản phẩm nam</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>New Arrivals</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0 mb-4">
														<h6>Best Seller</h6>
													</a>
												</div>													
											</div>
											<div class="col-12 col-md-4">
												<h5 class="text-center text-black py-4"><strong>DÒNG SẢN PHẨM</strong></h5>
												<div class="list-group list-group-light text-center">
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0">
														<h6>Basas</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>Vintas</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>Urbas</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0 mb-4">
														<h6>Pattas</h6>
													</a>
												</div>		
											</div>
											<div class="col-12 col-md-4">
												<h5 class="text-center text-black py-4"><strong>PHỤ KIỆN</strong></h5>
												<div class="list-group list-group-light text-center">
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0">
														<h6>Nón</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>Dây Giày</h6>
													</a>
													<a href="{{url('men')}}" class="list-group-item px-0 py-1 border-0 mb-4">
														<h6>Vớ</h6>
													</a>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
                        </li>
						<li class="nav-item ms-0 me-0">
                            <h6 class="nav-link text-black-50">|</h6>
						</li>
						<li class="nav-item {{Request::is('women')? 'active':''}}">
							<div class="dropdown position-static">
								<a class="nav-link hover-bar" href="{{url('women')}} {{Request::is('women')? 'active':''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<h5><strong>NỮ</strong></h5>
								</a>
								<div class="dropdown-menu w-100">
									<div class="container">
										<div class="row w-100">
											<div class="col-12 col-md-4">
												<h5 class="text-center text-black py-4"><strong>NỔI BẬT</strong></h5>
												<div class="list-group list-group-light text-center">
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0">
														<h6>Tất cả sản phẩm nữ</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>New Arrivals</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0 mb-4">
														<h6>Best Seller</h6>
													</a>
												</div>													
											</div>
											<div class="col-12 col-md-4">
												<h5 class="text-center text-black py-4"><strong>DÒNG SẢN PHẨM</strong></h5>
												<div class="list-group list-group-light text-center">
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0">
														<h6>Basas</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>Vintas</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>Urbas</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0 mb-4">
														<h6>Pattas</h6>
													</a>
												</div>		
											</div>
											<div class="col-12 col-md-4">
												<h5 class="text-center text-black py-4"><strong>PHỤ KIỆN</strong></h5>
												<div class="list-group list-group-light text-center">
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0">
														<h6>Nón</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0"> 
														<h6>Dây Giày</h6>
													</a>
													<a href="{{url('women')}}" class="list-group-item px-0 py-1 border-0 mb-4">
														<h6>Vớ</h6>
													</a>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
                        </li>
						<!--
						<li class="nav-item {{Request::is('about')? 'active':''}}">
                            <a class="nav-link" href="{{url('about')}}">DANH MỤC</a>
                        </li>
						<li class="nav-item {{Request::is('contact')? 'active':''}}">
                            <a class="nav-link" href="{{url('contact')}}">LIÊN HỆ</a>
                        </li>
					-->
					<!--
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
					-->
					</ul>
					
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-4 me-4">
						<li class="nav-item me-0 ">
							<a class="nav-link" href="{{url('like')}}">
								<span class="material-icons-outlined {{Request::is('like')? 'active':''}}">favorite</span>
							</a>
						</li>
						<li class="nav-item">
                            <a class="nav-link" href="{{url('cart')}}">
								<span class="material-icons-outlined {{Request::is('cart')? 'active':''}}">shopping_cart</span>
							</a>
                        </li>
						<!--
						<li class="nav-item">
							<a href="" class="nav-link">
								<div class="profile">
									<img src="frontend/images/person_1.jpg" class="img-fluid">
								</div>
							</a>
						</li>
						-->
						<li class="nav-item">
							<div class="dropdown">
								<a class="nav-link" href="{{url('profile')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									<span class="material-icons-round {{Request::is('profile')? 'active':''}}">person</span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li><a class="dropdown-item" href="{{url('profile')}}">Tài khoản</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#">Đăng xuất</a></li>
								</ul>
							</div>
							
						</li>
						
					</ul>
					<form class="d-flex col-lg-3 ms-5">
						<input class="form-control ds-input me-2 ms-2 rounded-0" type="search" placeholder="Tìm kiếm" aria-label="Search">
					</form>
				</div>
			</div>
		</nav>
		