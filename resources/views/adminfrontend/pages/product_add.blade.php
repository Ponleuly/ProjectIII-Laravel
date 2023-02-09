@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <h4 class="mt-3 text-black">Add Product</h4>
        <form action="">
            <div class="row ">
                <div class="col-md-12 my-3 mb-md-0">
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <div class="col-md-12">
                                        <label for="c_fname"><p class="text-label">Product name</p></label>
                                        <input type="text" class="form-control rounded-0 fw-500 mb-2" id="c_fname" name="c_fname" placeholder="product name...">

                                        <label for="product_des"><p class="text-label mt-2">Description</p></label>
                                        <textarea class="form-control rounded-0 fw-500 mb-2" rows="5" placeholder="product description..." name="product_des" id="product_des"></textarea>

                                        <label for="c_email_address"><p class="text-label mt-2">Images (5 pictures)</p></label>
                                        <input class="form-control rounded-0 mb-2" type="file" placeholder="xxx" id="formFile" accept="image/png, image/jpeg, image/jpg" multiple>

                                        <label for="c_fname"><p class="text-label mt-2 ">Product price ($)</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" value="00.00" step="0.05"  name="c_fname" placeholder="00.00">

                                        <label for="c_fname"><p class="text-label mt-2">Product total stock</p></label>
                                        <input class="form-control rounded-0 fw-500" type="number" min="1" name="c_fname" placeholder="00">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group mb-2">
                                        <div class="row mb-2">
                                            <label for="c_fname"><p class="text-label">Product color</p></label>
                                            <div class="col-md-2 ">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="c_fname"><p class="text-label">Product size</p></label>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="size35" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="size35">35</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="size36" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="size36">36</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">37</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">38</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">39</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                <label class="btn btn-outline-primary rounded-0 w-100" for="btn-check-outlined">40</label><br>
                                            </div>
                                        </div>

                                        <label for="c_fname"><p class="text-label mt-2">Product category</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="category select">
                                            <option selected>Select category</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <label for="c_fname"><p class="text-label mt-2">Product group</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="group select">
                                            <option selected>Select group</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <div class="d-flex mt-4">
                                            <button class="btn btn-primary rounded-0 ms-auto mt-3" type="submit">Submit form</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#product_des' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection()