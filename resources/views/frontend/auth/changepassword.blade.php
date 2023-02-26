@extends('index')
@section('content')
    <nav aria-label="breadcrumb">
		<ol class="breadcrumb px-3 py-2 mb-0" style="background: #cc2936">
		  	<li class="breadcrumb-item ">
				<a href="{{url("home")}}" class="text-light">Home</a>
			</li>
		  	<li class="breadcrumb-item text-light">Profile</li>
		</ol>
	</nav>

	<div class="untree_co-section before-footer-section">

        <div class="container">
            <div class="row">
                <!-------- Message ------------------->
                @if(Session::has('alert'))
                    <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
                        {{Session::get('alert')}}
                        <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-------- Message ------------------->
                <div class="col-md-12 border p-5 p-lg-5 bg-white">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-detail d-flex align-items-center justify-content-center">
                                <img src="/frontend/images/delivery.jpg" class="img-fluid mb-3">
                            </div>
                            <h5 class="username text-center py-2 mb-4 ">{{Auth::user()->name}}</h5>
                            <div class="list-group list-group-flush">
                                <a
                                    href="{{url('profile')}}"
                                    class="list-group-item list-group-item-action
                                            {{Request::is('profile')? 'active':''}}
                                        "
                                    aria-current="true"
                                    >
                                    General profile
                                </a>
                                <a href="{{url('purchase-history')}}"
                                    class="list-group-item list-group-item-action
                                            {{Request::is('purchase-history')? 'active':''}}
                                        "
                                    >
                                    Purchase history
                                </a>
                                <a
                                    href="{{url('change-password')}}"
                                    class="list-group-item list-group-item-action
                                            {{Request::is('change-password')? 'active':''}}
                                        "
                                    >
                                    Change password
                                </a>
                                <a href="{{url('logout')}}" class="list-group-item list-group-item-action">
                                    Sign out
                                </a>
                            </div>
                        </div>

                        <div class="col-md-8 ps-4">
                            <h5 class="text-black py-2">Change Password</h5>
                            <form
                                action="{{url('change-password/'. Auth::user()->id)}}"
                                method="POST"
                                enctype="multipart/form-data"
                                class="form-floating"
                                >
                                @csrf <!-- to make form active -->
                                @method('PUT')
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input
                                                id="current_password"
                                                type="password"
                                                class="form-control rounded-0 @error('current_password') is-invalid @enderror"
                                                name="current_password"
                                                required
                                                autocomplete="new-password"
                                            >
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="floatingInputValue">Current Password</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input
                                                id="password"
                                                type="password"
                                                class="form-control rounded-0 @error('password') is-invalid @enderror"
                                                name="password"
                                                required
                                                autocomplete="new-password"
                                            >
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="floatingInputValue">New Password</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input
                                                id="password-confirm"
                                                type="password"
                                                class="form-control rounded-0"
                                                name="password_confirmation"
                                                required autocomplete="new-password"
                                            >
                                            <label for="floatingInputValue">Comfirme New Password</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-grid gap-2 my-2">
                                    <button class="btn btn-primary rounded-0" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()