@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <!--------------- Alert ------------------------>
        @if(Session::has('alert'))
        <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
            {{Session::get('alert')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       @endif
       <!---------------End Alert ------------------------>

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

                                        <label for="product_name"><p class="text-label">Product Name</p></label>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 fw-500 mb-2"
                                            id="product_name"
                                            name="product_name"
                                            placeholder="product name..."
                                            required
                                        >

                                        <label for="product_code"><p class="text-label mt-2">Product Code</p></label>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 fw-500 mb-2"
                                            id="product_code"
                                            name="product_code"
                                            placeholder="product code..." required
                                        >

                                        <label for="product_des"><p class="text-label mt-2">Description</p></label>
                                        <textarea
                                            class="form-control rounded-0 fw-500"
                                            placeholder="product description..."
                                            name="product_des"
                                            id="product_des"
                                            ></textarea>

                                        <label for="product_imgcover"><p class="text-label mt-3">Image Cover (1 picture)</p></label>
                                        <input
                                            class="form-control rounded-0 mb-2"
                                            type="file"
                                            id="product_imgcover"
                                            name="product_imgcover"
                                            accept="image/png, image/jpeg, image/jpg"
                                            required
                                        >

                                        <label for="product_imgreview"><p class="text-label mt-2">Images Review (4 pictures)</p></label>
                                        <input
                                            class="form-control rounded-0 mb-2"
                                            type="file"
                                            id="product_imgreview"
                                            name="product_imgreview[]"
                                            accept="image/png, image/jpeg, image/jpg"
                                            multiple
                                            required
                                        >

                                        <label for="product_price"><p class="text-label mt-2">Product Price ($)</p></label>
                                        <input
                                            class="form-control rounded-0 fw-500 mb-2"
                                            type="number"
                                            min="0"
                                            step="0.05"
                                            name="product_price"
                                            id="product_price"
                                            placeholder="00.00"
                                            required
                                        >

                                        <label for="product_saleprice"><p class="text-label mt-2">Product Sale Price ($)</p></label>
                                        <input
                                            class="form-control rounded-0 fw-500 mb-2"
                                            type="number"
                                            min="0"
                                            step="0.05"
                                            name="product_saleprice"
                                            id="product_saleprice"
                                            placeholder="00.00"
                                            required
                                        >

                                        <label for="group_id"><p class="text-label mt-2">Product Group</p></label><br>
                                        @foreach ($groups as $row)
                                            <div class="form-check form-check-inline">
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    id="{{$row->group_name}}"
                                                    value="{{$row->id}}"
                                                    name="group_id[]"
                                                    @if ($loop->first)
                                                        checked
                                                    @endif
                                                >
                                                <label class="form-check-label" for="{{$row->group_name}}">{{$row->group_name}}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group mb-2">

                                        <label for="category_id" ><p class="text-label" >Product Category</p></label>
                                        <select
                                            class="form-select rounded-0 mb-2"
                                            aria-label="category select"
                                            name="category_id"
                                            id="category_id"
                                            required
                                            >
                                            <option selected disabled value="">Select Category</option>
                                            @foreach ($categories as $item2)
                                                <option value="{{$item2->id}}">{{$item2->category_name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="subcategory_id" ><p class="text-label mt-2" >Product Subcategory</p></label>
                                        <select
                                            class="form-select rounded-0 mb-2"
                                            aria-label="category select"
                                            name="subcategory_id"
                                            id="subcategory_id"
                                            required
                                            >
                                            <option selected disabled value="">Select Subcategory</option>
                                            @foreach ($subCategories as $item1)
                                                <option value="{{$item1->id}}">{{$item1->sub_category}}</option>
                                            @endforeach
                                        </select>
                                        <!-- Start Product color and quantity -->
                                        <label for="color_id[]"><p class="text-label mt-2">Product Color</p></label><br>
                                        <input
                                            type="color"
                                            class="form-control form-control-color d-flex w-100 rounded-0 mb-2"
                                            id="product_color"
                                            name="product_color"
                                            value="#c5c5c5"
                                            placeholder="product name..."
                                            required
                                        >
                                        <!-- End Product color and quantity -->

                                        <!-- Start Product size and quantity -->
                                        <label for="size"><p class="text-label mt-2">Product Size and Quantity</p></label><br>
                                        <div class="border border-1 p-3 mb-2">
                                            <div class="row">
                                                 @foreach ($sizes as $item1)
                                                    <div class="col-md-4 mb-2">
                                                        <div class="border border-1 py-2 px-2">
                                                            <div class="row mb-1">
                                                                <div class="col-md-5">
                                                                    <label for="size"><p class="text-label">Size: </p></label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input
                                                                        type="checkbox"
                                                                        class="form-check-input sizeAll"
                                                                        id="size{{$item1->size_number}}"
                                                                        value="{{$item1->id}}"
                                                                        name="size_id[{{$item1->id}}]"
                                                                        @if ($loop->first)
                                                                            checked
                                                                        @endif
                                                                    >
                                                                    <label class="form-check-label fw-500" for="size{{$item1->size_number}}">
                                                                        {{$item1->size_number}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <label for="size_quantity"><p class="text-label">Quantity: </p></label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input
                                                                        class="form-control rounded-0 w-100 py-0"
                                                                        type="number"
                                                                        min="0"
                                                                        name="size_quantity[{{$item1->id}}]"
                                                                        id="size_quantity"
                                                                        placeholder="00"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="form-check mb-0">
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    id="size"
                                                    onclick="javascript:sizeAll(this)"
                                                >
                                                <label class="form-check-label text-danger ms-1" for="size">Check All</label>
                                            </div>
                                        </div>
                                        <!-- End Product size and quantity -->

                                        <div class="d-flex mt-4" style="padding-top: 2px">
                                            <a
                                                class="btn btn-outline-danger rounded-0 mt-2"
                                                href="{{url('/admin/product-detail-list')}}"
                                                role="button"
                                                >
                                                Back to List
                                            </a>
                                            <button class="btn btn-primary rounded-0 ms-auto mt-2" type="submit">Add Product</button>
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
    <script>
        function sizeAll(o) {
            var boxes = document.getElementsByClassName("sizeAll");
            for (var x = 0; x < boxes.length; x++) {
                var obj = boxes[x];
                if (obj.type == "checkbox") {
                if (obj.name != "check")
                    obj.checked = o.checked;
                }
            }
        }
        function colorAll(o) {
            var color = document.getElementsByClassName("colorAll");
            for (var x = 0; x < color.length; x++) {
                var obj = color[x];
                if (obj.type == "checkbox") {
                if (obj.name != "check")
                    obj.checked = o.checked;
                }
            }
        }
    </script>
@endsection()