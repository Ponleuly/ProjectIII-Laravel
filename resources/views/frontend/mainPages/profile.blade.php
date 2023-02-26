@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row px-3 py-2 text-center" style="background: #cc2936">
        <h5 class="text-light pt-2">THÔNG TIN TÀI KHOẢN</h5>
        </div>
    </div>

	<div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border p-5 p-lg-5 bg-white">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-detail d-flex align-items-center justify-content-center">
                                <img src="frontend/images/person_1.jpg" class="img-fluid mb-3">
                            </div>
                            <h5 class="username text-center py-2 mb-4 ">{{Auth::user()->name}}</h5>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true" >
                                    Tài khoản của bạn
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                Đổi mật khẩu
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    Lịch sử mua hàng
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    Đăng xuất
                                </a>
                            </div>
                        </div>

                        <div class="col-md-8 ps-4">
                            <h5 class="text-black py-2">Thông tin khách hàng</h5>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <form class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="floatingInputValue" placeholder="name@example.com" value="Ly Ponleu">
                                        <label for="floatingInputValue">Họ và tên</label>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="floatingInputValue" placeholder="name@example.com" value="Nam">
                                        <label for="floatingInputValue">Giới tính</label>
                                    </form>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-md-6">
                                    <form class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="floatingInputValue" placeholder="name@example.com" value="0843142150">
                                        <label for="floatingInputValue">Số điện thoại</label>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="floatingInputValue" placeholder="name@example.com" value="lyponleu116@gmail.com">
                                        <label for="floatingInputValue">Email</label>
                                    </form>
                                </div>
                            </div>

                            <div class="row py-3">
                                <div class="col-md-6">
                                    <form class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="floatingInputValue" placeholder="name@example.com" value="23 Tạ Quang Bửu">
                                        <label for="floatingInputValue">Địa chỉ</label>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form class="form-floating">
                                        <input type="email" class="form-control rounded-0" id="floatingInputValue" placeholder="name@example.com" value="Nam">
                                        <label for="floatingInputValue">Gioi tinh</label>
                                    </form>
                                </div>
                            </div>

                            <div class="d-grid gap-2 my-2">
                                <button class="btn btn-primary rounded-0" type="button">CẬP NHẬT THÔNG TIN</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection()