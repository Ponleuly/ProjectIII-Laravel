@extends('index')
@section('content') 
<!-- Start Hero Section -->
		<div class="container-fluid">
			<div class="row px-3 py-2 text-center" style="background: #cc2936">
			<h5 class="text-light pt-2">THÔNG TIN ĐẶT HÀNG</h5>
			</div>
		</div>
  
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		      <div class="row mb-5">
		        <div class="col-md-12">
		          <div class="border p-4 rounded" role="alert">
		            Đã có tài khoản? <a href="#">Bấm vào đây</a> để đăng nhập
		          </div>
		        </div>
		      </div>
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">THÔNG TIN GIAO HÀNG</h2>
		          <div class="p-3 p-lg-5 border bg-white">
					<!--
		            <div class="form-group">
		              <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
		              <select id="c_country" class="form-control">
		                <option value="1">Select a country</option>    
		                <option value="2">bangladesh</option>    
		                <option value="3">Algeria</option>    
		                <option value="4">Afghanistan</option>    
		                <option value="5">Ghana</option>    
		                <option value="6">Albania</option>    
		                <option value="7">Bahrain</option>    
		                <option value="8">Colombia</option>    
		                <option value="9">Dominican Republic</option>    
		              </select>
		            </div>
				-->
		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_fname" class="text-black">Tên Khách Hàng <span class="text-danger">*</span></label>
		                <input type="text" class="form-control rounded-0" id="c_fname" name="c_fname" placeholder="họ và tên">
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_phone" class="text-black">Số điện thoại </label>
		                <input type="text" class="form-control rounded-0" id="c_phone" name="c_phone" placeholder="xxx xxx xxx xxx">
		              </div>
		            </div> 

					<div class="form-group row">
						<div class="col-md-12">
							<label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
							<input type="text" class="form-control rounded-0" id="c_email_address" name="c_email_address" placeholder="example@gmail.com">
						  </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
		                <input type="text" class="form-control rounded-0" id="c_address" name="c_address" placeholder="23 Ta Quang Buu">
		              </div>
		            </div>

					<div class="form-group">
						<label for="c_city" class="text-black">Tỉnh / Thành phố <span class="text-danger">*</span></label>
						<select id="c_city" class="form-control  rounded-0">
						  <option value="1">chọn tỉnh / thành phố</option>    
						  <option value="2">bangladesh</option>    
						  <option value="3">Algeria</option>    
						  <option value="4">Afghanistan</option>    
						  <option value="5">Ghana</option>    
						  <option value="6">Albania</option>    
						  <option value="7">Bahrain</option>    
						  <option value="8">Colombia</option>    
						  <option value="9">Dominican Republic</option>    
						</select>
					  </div>
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_commune" class="text-black ">Quận / Huyện <span class="text-danger">*</span></label>
		                <select id="c_commune" class="form-control rounded-0">
							<option value="1">chọn quận / huyện</option>    
							<option value="2">bangladesh</option>    
							<option value="3">Algeria</option>    
							<option value="4">Afghanistan</option>    
							<option value="5">Ghana</option>    
							<option value="6">Albania</option>    
							<option value="7">Bahrain</option>    
							<option value="8">Colombia</option>    
							<option value="9">Dominican Republic</option>    
						  </select>
		              </div>
		              <div class="col-md-6">
		                <label for="c_village" class="text-black ">Phường / Xã <span class="text-danger">*</span></label>
						<select id="c_village" class="form-control rounded-0">
							<option value="1">chọn phường / xã</option>    
							<option value="2">bangladesh</option>    
							<option value="3">Algeria</option>    
							<option value="4">Afghanistan</option>    
							<option value="5">Ghana</option>    
							<option value="6">Albania</option>    
							<option value="7">Bahrain</option>    
							<option value="8">Colombia</option>    
							<option value="9">Dominican Republic</option>    
						  </select>
					</div>
		            </div>
					<!--
		            <div class="form-group">
		              <label for="c_create_account" class="text-black" data-bs-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
		              <div class="collapse" id="create_an_account">
		                <div class="py-2 mb-4">
		                  <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
		                  <div class="form-group">
		                    <label for="c_account_password" class="text-black">Account Password</label>
		                    <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
		                  </div>
		                </div>
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
		              <div class="collapse" id="ship_different_address">
		                <div class="py-2">

		                  <div class="form-group">
		                    <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
		                    <select id="c_diff_country" class="form-control">
		                      <option value="1">Select a country</option>    
		                      <option value="2">bangladesh</option>    
		                      <option value="3">Algeria</option>    
		                      <option value="4">Afghanistan</option>    
		                      <option value="5">Ghana</option>    
		                      <option value="6">Albania</option>    
		                      <option value="7">Bahrain</option>    
		                      <option value="8">Colombia</option>    
		                      <option value="9">Dominican Republic</option>    
		                    </select>
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
		                    </div>
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-12">
		                      <label for="c_diff_companyname" class="text-black">Company Name </label>
		                      <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
		                    </div>
		                  </div>

		                  <div class="form-group row  mb-3">
		                    <div class="col-md-12">
		                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
		                    </div>
		                  </div>

		                  <div class="form-group row mb-5">
		                    <div class="col-md-6">
		                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
		                    </div>
		                  </div>

		                </div>
		              </div>
		            </div>
				-->
		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Yêu cầu khác</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control rounded-0" placeholder="nhập yêu cầu của bạn..."></textarea>
		            </div>

		          </div>
		        </div>
		        <div class="col-md-6">

		          <div class="row mb-5">
		            <div class="col-md-12">
						<h2 class="h3 mb-3 text-black">MÃ KHUYẾN MÃI</h2>
						<div class="p-3 p-lg-5 border bg-white">
						  <div class="input-group w-85">
							  <input type="text" class="form-control py-2 rounded-0" id="coupon" placeholder="nhập mã" aria-label="nhập mã" aria-describedby="button-addon2">
							  <button class="btn btn-outline-secondary px-3 fw-semibold  rounded-0" type="button" id="button-addon2">ÁP DỤNG</button>
						  </div>
						</div>
					  </div>
		          </div>

		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">THANH TOÁN</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Đơn hàng</th>
		                    <th class="text-end">Tổng tiền</th>
		                  </thead>
		                  <tbody>
		                    <tr>
		                      <td class="border-bottom-0">Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
		                      <td class="text-end border-bottom-0">400.000 VND</td>
		                    </tr>
		                    <tr>
		                      <td>Polo Shirt <strong class="mx-2">x</strong>   1</td>
		                      <td class="text-end">400.000 VND</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold border-bottom-0"><strong>Đơn hàng</strong></td>
		                      <td class="text-black text-end border-bottom-0"><strong>800.000 VND</strong></td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold border-bottom-0"><strong>Giảm</strong></td>
		                      <td class="text-black text-end font-weight-bold border-bottom-0"><strong>100.000 VND</strong></td>
							</tr>
							<tr>
								<td class="text-black font-weight-bold"><strong>Phí vận chuyển</strong></td>
								<td class="text-black text-end font-weight-bold"><strong>0 VND</strong></td>
							</tr>
							<tr>
								<td class="text-black h6 fw-bold border-bottom-0"><strong>TỔNG CỘNG</strong></td>
								<td class="text-danger text-end h6 fw-bold border-bottom-0"><strong>700.000 VND</strong></td>
							</tr>
		                  </tbody>
		                </table>

		                <div class="border p-3 mb-3">
							<div class="form-check ">
								<input class="form-check-input big-radio me-2" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
								<label class="form-check-label" for="flexRadioDefault1">
									<h3 class="h6 mb-0">
										<a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">
											Thanh toán trực tiếp khi giao hàng
										</a>
									</h3>
								</label>
							</div>
		                  <div class="collapse" id="collapsebank">
		                    <div class="py-2">
		                      <p class="mb-0">Thanh toán khi nhận được hàng.</p>
		                    </div>
		                  </div>
		                </div>

		                <div class="border p-3 mb-3">
							<div class="form-check">
								<input class="form-check-input big-radio me-2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
								<label class="form-check-label" for="flexRadioDefault2">
									<h3 class="h6 mb-0">
										<a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">
											Thanh toán bằng chuyển khoản ngân hàng
										</a>
									</h3>
								</label>
							  </div>
		                  <div class="collapse" id="collapsecheque">
		                    <div class="py-2">
								<p class="mb-0">Khách hàng vui lòng chuyển khoản qua tài khoản ngân hàng dưới đây :</p>
								<p class="mb-0">Tên ngân hàng: <strong class="text-danger">Agribank</strong></p>
								<p class="mb-0">Số tài khoản: <strong class="text-danger">1303206422785</strong></p>
								<p class="mb-0">Chủ tài khoản: <strong class="text-danger">LY PONLEU</strong></p>
								<p class="mb-0">Nội dụng chuyển khoản: <strong class="text-danger">Tên khách hàng + Mã đặt hàng</strong></p>
		                    </div>
		                  </div>
		                </div>

						<div class="d-grid">
							<button class="btn btn-block px-4 py-3 fw-semibold  rounded-0" onclick="location.href='{{ url('thankyou') }}'">HOÀN TẤT ĐẶT HÀNG</button>
						</div>
		                </div>
		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		      <!-- </form> -->
		    </div>
		  </div>
@endsection()