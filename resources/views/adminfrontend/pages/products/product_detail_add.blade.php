@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <h4 class="mt-3 text-black">Add Product</h4>
        <form action="{{url('/admin/product-detail-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row ">
                <div class="col-md-12 my-3 mb-md-0">
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <div class="col-md-12">
                                        <label for="product_name"><p class="text-label">Product name</p></label>
                                        <input type="text" class="form-control rounded-0 fw-500 mb-2" id="product_name" name="product_name" placeholder="product name..." required>

                                        <label for="product_des"><p class="text-label mt-2">Description</p></label>
                                        <textarea class="form-control rounded-0 fw-500 mb-2" placeholder="product description..." name="product_des" id="product_des"></textarea>

                                        <label for="product_img"><p class="text-label mt-4">Images (5 pictures)</p></label>
                                        <input class="form-control rounded-0 mb-2" type="file" id="product_img" name="product_img" accept="image/png, image/jpeg, image/jpg" multiple required>

                                        <label for="product_price"><p class="text-label mt-2 ">Product price ($)</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" step="0.05" name="product_price" id="product_price" placeholder="00.00" required>

                                        <label for="product_stock"><p class="text-label mt-2">Product total stock</p></label>
                                        <input class="form-control rounded-0 fw-500" type="number" min="1" name="product_stock" id="product_stock" placeholder="00" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group mb-2">
                                        <div class="row mb-2">
                                            <label for="color_idd"><p class="text-label">Product color</p></label>
                                            <div class="col-md-2 ">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100" name="color_id[]" id="exampleColorInput" valuec=null title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100"  name="color_id[]" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100"  name="color_id[]" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100"  name="color_id[]" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100"  name="color_id[]" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <input type="color" class="form-control form-control-color rounded-0 w-100"  name="color_id[]" id="exampleColorInput" value="#c5c5c5" title="Choose your color">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="size_id"><p class="text-label">Product size</p></label>
                                            @foreach ($product_sizes as $item1)
                                                <div class="col-md-2 mb-3">
                                                    <input type="checkbox" class="btn-check" id="size{{$item1->size}}" name="size_id[]" value="{{$item1->id}}" autocomplete="off">
                                                    <label class="btn btn-outline-primary rounded-0 w-100" for="size{{$item1->size}}">{{$item1->size}}</label><br>
                                                </div>
                                            @endforeach
                                        </div>

                                        <label for="category_id "><p class="text-label mt-2">Product category</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="category select" name="category_id" id="category_id" required>
                                            <option selected>Select category</option>
                                            @foreach ($product_categories as $item2)
                                                <option value="{{$item2->id}}">{{$item2->category_name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="group_id"><p class="text-label mt-2">Product group</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="group select" name="group_id" id="group_id" required>
                                            <option selected>Select group</option>
                                            @foreach ($product_groups as $item3)
                                                <option value="{{$item3->id}}">{{$item3->group_name}}</option>
                                            @endforeach
                                        </select>

                                        <div class="d-flex mt-4">
                                            <a class="btn btn-outline-danger rounded-0 mt-3" href="{{url('/admin/product-category-list')}}" role="button">Back to list</a>
                                            <button class="btn btn-primary rounded-0 ms-auto mt-3" type="submit" >Add product</button>
                                        </div>
                                        <!--formnovalidate="formnovalidate" => for textarea input with CKeditor-->
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