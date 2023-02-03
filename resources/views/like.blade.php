@extends('index')
@section('content') 
    <div class="container-fluid">
        <div class="row px-3 py-2 text-center" style="background: #cc2936">
        <h5 class="text-light pt-2">DANH MỤC YÊU THÍCH CỦA BẠN</h5>
        </div>
    </div>
  
	<div class="untree_co-section before-footer-section">
        <div class="container">
            <hr class="line-color">
            <div class="row my-5">
                <div class="col-md-2">
					<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                </div>
                <div class="col-md-4">
                    <h4 class="mb-3 text-black fw-bold">Vanss Sneaker</h4>
                    <h6 class="text-danger fw-bold py-4"><strong>700.000 VND</strong></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-1 text-black fw-bold py-2">SIZE</h6>
                            <select class="form-select form-control bg-transparent rounded-0" aria-label="Default select example">
                                <option value="product-siz" selected>35</option>
                                <option value="product-siz">36</option>
                                <option value="product-siz">37</option>
                                <option value="product-siz">38</option>
                                <option value="product-siz">39</option>
                                <option value="product-siz">40</option>
                                <option value="product-siz">41</option>
                                <option value="product-siz">42</option>
                                <option value="product-siz">43</option>
                                <option value="product-siz">44</option>
                                <option value="product-siz">45</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1 text-black fw-bold py-2">SỐ LƯỢNG</h6>
                            <div class="form-outline">
                                <input class="form-control bg-transparent rounded-0" type="number" name="quantity" id="quantity" value="1" max="5" min="1">
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-md-6 d-flex align-items-end flex-column justify-content-end">
                    <div class="col-sm-2 d-grid py-3">
                        <a href="" class="btn btn-block py-1 fw-semibold rounded-0 cart-add ">
                            <span class="material-icons-outlined py-1 {{Request::is('cart')? 'active':''}}">shopping_cart</span>
                        </a>
                    </div>
                    <div class="col-sm-2 d-grid">
                        <a href="" class="btn btn-block py-1 fw-semibold rounded-0">
                            <span class="material-icons-outlined py-1 {{Request::is('cart')? 'active':''}}">delete</span>
                        </a>
                    </div>
                </div>   
            </div>
            <hr>
            <div class="row my-5">
                <div class="col-md-2">
					<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                </div>
                <div class="col-md-4">
                    <h4 class="mb-3 text-black fw-bold">Vanss Sneaker</h4>
                    <h6 class="text-danger fw-bold py-4"><strong>700.000 VND</strong></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-1 text-black fw-bold py-2">SIZE</h6>
                            <select class="form-select form-control bg-transparent rounded-0" aria-label="Default select example">
                                <option value="product-siz" selected>35</option>
                                <option value="product-siz">36</option>
                                <option value="product-siz">37</option>
                                <option value="product-siz">38</option>
                                <option value="product-siz">39</option>
                                <option value="product-siz">40</option>
                                <option value="product-siz">41</option>
                                <option value="product-siz">42</option>
                                <option value="product-siz">43</option>
                                <option value="product-siz">44</option>
                                <option value="product-siz">45</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1 text-black fw-bold py-2">SỐ LƯỢNG</h6>
                            <div class="form-outline">
                                <input class="form-control bg-transparent rounded-0" type="number" name="quantity" id="quantity" value="1" max="5" min="1">
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-md-6 d-flex align-items-end flex-column justify-content-end">
                    <div class="col-sm-2 d-grid py-3">
                        <a href="" class="btn btn-block py-1 fw-semibold rounded-0 cart-add ">
                            <span class="material-icons-outlined py-1 {{Request::is('cart')? 'active':''}}">shopping_cart</span>
                        </a>
                    </div>
                    <div class="col-sm-2 d-grid">
                        <a href="" class="btn btn-block py-1 fw-semibold rounded-0">
                            <span class="material-icons-outlined py-1 {{Request::is('cart')? 'active':''}}">delete</span>
                        </a>
                    </div>
                </div>   
            </div>
            <hr>
            <div class="row my-5">
                <div class="col-md-2">
					<img src="frontend/images/Giay_4.jpeg" class="img-fluid product-thumbnail">
                </div>
                <div class="col-md-4">
                    <h4 class="mb-3 text-black fw-bold">Vanss Sneaker</h4>
                    <h6 class="text-danger fw-bold py-4"><strong>700.000 VND</strong></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-1 text-black fw-bold py-2">SIZE</h6>
                            <select class="form-select form-control bg-transparent rounded-0" aria-label="Default select example">
                                <option value="product-siz" selected>35</option>
                                <option value="product-siz">36</option>
                                <option value="product-siz">37</option>
                                <option value="product-siz">38</option>
                                <option value="product-siz">39</option>
                                <option value="product-siz">40</option>
                                <option value="product-siz">41</option>
                                <option value="product-siz">42</option>
                                <option value="product-siz">43</option>
                                <option value="product-siz">44</option>
                                <option value="product-siz">45</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1 text-black fw-bold py-2">SỐ LƯỢNG</h6>
                            <div class="form-outline">
                                <input class="form-control bg-transparent rounded-0" type="number" name="quantity" id="quantity" value="1" max="5" min="1">
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-md-6 d-flex align-items-end flex-column justify-content-end">
                    <div class="col-sm-2 d-grid py-3">
                        <a href="" class="btn btn-block py-1 fw-semibold rounded-0 cart-add ">
                            <span class="material-icons-outlined py-1 {{Request::is('cart')? 'active':''}}">shopping_cart</span>
                        </a>
                    </div>
                    <div class="col-sm-2 d-grid">
                        <a href="" class="btn btn-block py-1 fw-semibold rounded-0">
                            <span class="material-icons-outlined py-1 {{Request::is('cart')? 'active':''}}">delete</span>
                        </a>
                    </div>
                </div>   
            </div>
            <hr class="line-color">
        </div>
    </div>
@endsection()