@extends('index')
@section('content') 
  <div class="container-fluid">
    <div class="row px-3 py-2 text-center" style="background: #cc2936">
      <h5 class="text-light pt-2">GỈO HÀNG</h5>
    </div>
  </div>
  
		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity" style="width: 160px">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="product-thumbnail">
                            <img src="frontend/images/Giay_1.jpeg" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">Product 1</h2>
                          </td>
                          <td>$49.00</td>
                          <td>
                            <div class="input-group d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                              </div>
                              <input type="text" class="form-control text-center quantity-amount" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                              </div>
                            </div>
                          </td>
                          <td>$49.00</td>
                          <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                        </tr>
        
                        <tr>
                          <td class="product-thumbnail">
                            <img src="frontend/images/Giay_3.jpeg" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">Product 2</h2>
                          </td>
                          <td>$49.00</td>
                          <td>
                            <div class="input-group d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                              </div>
                              <input type="text" class="form-control text-center quantity-amount" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                              </div>
                            </div>
        
                          </td>
                          <td>$49.00</td>
                          <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-black btn-sm btn-block rounded-pill px-4 py-2 fw-semibold">XÓA HẾT</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block rounded-pill px-4 py-2 fw-semibold">QUAY LẠI MUA HÀNG</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="h4 mb-3 text-black">MÃ KHUYẾN MÃI</h2>
                      <div class="d-grid col-md-8">
                        <div class="input-group mb-5">
                          <input type="text" class="form-control py-2" id="coupon" placeholder="nhập mã" aria-label="nhập mã" aria-describedby="button-addon2">
                          <button class="btn btn-outline-secondary px-3 fw-semibold" type="button" id="button-addon2">ÁP DỤNG</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5 ">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-center">TỔNG TIỀN TẠM TÍNH</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Giảm</span>
                        </div>
                        <div class="col-md-6 text-end">
                          <strong class="text-black">100.000 VND</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Tổng đơn hàng</span>
                        </div>
                        <div class="col-md-6 text-end">
                          <strong class="text-black">500.000 VND</strong>
                        </div>
                      </div>
        
                      <div class="row text-center">
                        <div class="d-grid">
                            <button class="btn btn-block py-3 px-4 fw-semibold" onclick="location.href='{{ url('checkout') }}'">
                                TIẾP TỤC THANH TOÁN
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection()