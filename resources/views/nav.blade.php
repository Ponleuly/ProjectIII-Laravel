        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="{{url('home')}}">Lambada<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item {{Request::is('home')? 'active':''}}">
							<a class="nav-link" href="{{url('home')}}">Home</a>
						</li>
						<li class="nav-item {{Request::is('shop')? 'active':''}}">
                            <a class="nav-link" href="{{url('shop')}}">Shop</a>
                        </li>
						<li class="nav-item {{Request::is('about')? 'active':''}}">
                            <a class="nav-link" href="{{url('about')}}">About us</a>
                        </li>
						<li class="nav-item {{Request::is('services')? 'active':''}}">
                            <a class="nav-link" href="{{url('services')}}">Services</a>
                        </li>
						<li class="nav-item {{Request::is('blog')? 'active':''}}">
                            <a class="nav-link" href="{{url('blog')}}">Blog</a>
                        </li>
						<li class="nav-item {{Request::is('contact')? 'active':''}}">
                            <a class="nav-link" href="{{url('contact')}}">Contact us</a>
                        </li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="frontend/images/user.svg"></a></li>
						<li>
                            <a class="nav-link" href="{{url('cart')}}"><img src="frontend/images/cart.svg"></a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>