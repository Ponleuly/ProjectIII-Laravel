<?php
	use App\Models\Groups;
	use App\Models\Categories_Groups;
	use App\Models\Categories_Subcategories;
?>
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
	<div class="container">
		<!---========== Start Logo shop ==============-->
		<a class="navbar-brand" href="{{url('home')}}">
			15Steps<span>.</span>
		</a>
		<button class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarsFurni"
			aria-controls="navbarsFurni"
			aria-expanded="false"
			aria-label="Toggle navigation"
			>
			<span class="navbar-toggler-icon"></span>
		</button>
		<!---========== End Logo shop ==============-->

		<div class="collapse navbar-collapse" id="navbarsFurni">
			<!-----========= Start Menu ===============--->
			<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 me-4">
				<!--==================Start Shop  Menu======================-->
					<li class="nav-item {{Request::is('shop')? 'active':''}}">
						<div class="dropdown position-static">
							<a
								class="nav-link hover-bar"
								href="{{url('/shop')}}
								{{Request::is('shop')? 'active':''}}"
								>
								<h5><strong>Shop</strong></h5>
							</a>
						</div>
                    </li>
						<!--==================End Shop  Menu======================-->
					<li class="nav-item ms-0 me-0">
                        <h6 class="nav-link text-black-50">|</h6>
					</li>
					@php
						$groups = Groups::orderBy('id')->get();
					@endphp
					@foreach ($groups as $group)
						<!--==================Start Product Group Menu======================-->
						<li class="nav-item {{Request::is('product-'.strtolower($group->group_name))? 'active':''}}">
							<div class="dropdown position-static">
								<a
									class="nav-link hover-bar"
									role="button"
									aria-expanded="false"
									href="{{url('product-' .strtolower($group->group_name))}}
									{{Request::is('product-'.strtolower($group->group_name))? 'active':''}}"
									>
									<h5><strong>{{$group->group_name}}</strong></h5>
								</a>
								<div class="dropdown-menu w-100">
									<div class="container">
										<div class="row w-100">
											@php
												$categories = Categories_Groups::where('group_id', $group->id)->get();
												$category_count = $categories->count();
											@endphp
											@foreach ($categories as $category)
												<div class="col-12 col-md-{{($category_count >= 4)? 3:4}}">
													<a href="{{url('product-category/'.strtolower($group->group_name).'/'.strtolower($category->rela_category->category_name))}}">
														<h5 class="text-center text-black py-4">
															<strong>{{$category->rela_category->category_name}}</strong>
														</h5>
													</a>
													@php
														$subCategories = Categories_Subcategories::where('category_id', $category->category_id)->get();
													@endphp
													<div class="list-group list-group-light text-center">
														@foreach ($subCategories as $subCategory)
															<a
																href="{{url('product-subcategory/'
																.strtolower($group->group_name).'/'
																.strtolower($category->rela_category->category_name).'/'
																.strtolower($subCategory->sub_category)
																)}}"
																class="list-group-item px-0 py-1 border-0"
																>
																<h6>{{$subCategory->sub_category}}</h6>
															</a>
														@endforeach
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
                        </li>
						<li class="nav-item ms-0 me-0">
                            <h6 class="nav-link text-black-50">{{($loop->last)? '':'|'}}</h6>
						</li>
					@endforeach
				<!--==================End Product Group Menu======================-->
			</ul>
			<!-----========= End Menu ===============--->

			<!-----========= Start Menu icon ===============--->
			<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-4 me-4">
				<li class="nav-item me-0 ">
					<a class="nav-link" href="{{url('like')}}">
						<span
							class="material-icons-outlined
							{{Request::is('like')? 'active':''}}"
							>
							favorite
						</span>
					</a>
				</li>
				<li class="nav-item">
                	<a class="nav-link text-dark pe-0" href="{{url('cart')}}">
						<span
							class="material-icons-outlined pe-0
							{{Request::is('cart')? 'active':''}}"
							>
							shopping_cart
						</span>
					</a>
                </li>
				<li class="nav-item">
					<span class="fs-6 nav-link text-danger mt-1 ps-0">(0)</span>
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
						<a
							class="nav-link"
							href="{{url('profile')}}"
							role="button"
							id="dropdownMenuLink"
							data-bs-toggle="dropdown"
							aria-expanded="false"
							>
							<span
								class="material-icons-round
								{{Request::is('profile')? 'active':''}}"
								>
								person
							</span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<li><a class="dropdown-item" href="{{url('profile')}}">Tài khoản</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Đăng xuất</a></li>
						</ul>
					</div>
				</li>
			</ul>
			<!-----========= Start Menu icon ===============--->
			<form class="d-flex col-lg-3 ms-5" action="">
				<input
					class="form-control ds-input me-2 ms-2 rounded-0"
					type="search"
					placeholder="Tìm kiếm"
					aria-label="Search"
				>
			</form>
		</div>
	</div>
</nav>
