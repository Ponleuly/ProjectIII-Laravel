<?php
	use App\Models\Products_Colors;
	use App\Models\Products_Sizes;
	use App\Models\Products_Imgreviews;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        @if(Session::has('alert'))
            <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                {{Session::get('alert')}}
                <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
		@endif

        <h4 class="mt-3 text-black">Edit Product</h4>
        <form action="{{url('/admin/product-detail-edit/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            @method('PUT')
            <div class="row ">
                <div class="col-md-12 my-3 mb-md-0">
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <div class="col-md-12">

                                        <label for="product_name">
                                            <p class="text-label">Product name</p>
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 fw-500 mb-2"
                                            id="product_name"
                                            name="product_name"
                                            placeholder="product name..."
                                            value="{{$products->product_name}}"
                                            required
                                        >

                                        <label for="product_name">
                                            <p class="text-label mt-2">Product code</p>
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 fw-500 mb-2"
                                            id="product_code"
                                            name="product_code"
                                            placeholder="product code..."
                                            value="{{$products->product_code}}"
                                            required
                                        >
                                        <label for="product_des">
                                            <p class="text-label mt-2">Description</p>
                                        </label>
                                        <textarea
                                            class="form-control rounded-0 fw-500"
                                            placeholder="product description..."
                                            name="product_des"
                                            id="product_des"
                                        >
                                            {{$products->product_des}}
                                        </textarea>

                                        <label for="product_imgcover">
                                            <p class="text-label mt-3">Image cover</p>
                                        </label>
                                        <div class="col-md-4">
                                            <img src="/product_img/imgcover/{{$products->product_imgcover}}" class="img-fluid product-thumbnail">
                                        </div>
                                        <label for="product_imgcover">
                                            <p class="text-label mt-3">Updata image cover (1 picture)</p>
                                        </label>
                                        <input
                                            class="form-control rounded-0 mb-2"
                                            type="file" id="product_imgcover"
                                            name="product_imgcover"
                                            accept="image/png, image/jpeg, image/jpg"
                                        >

                                        <label for="product_imgreview">
                                            <p class="text-label mt-2">Images review (4 pictures)</p>
                                        </label>
                                        <div class="row">
                                            @php
                                                $imgreviews = Products_Imgreviews::where('product_id', $products->id)->get();
                                            @endphp
                                            @foreach ($imgreviews as $imgreview)
                                                <div class="col-sm py-3">
                                                    <img src="/product_img/imgreview/{{$imgreview->product_imgreview}}" class="img-fluid product-thumbnail">
                                                </div>
                                            @endforeach
                                        </div>

                                        <label for="product_imgreview">
                                            <p class="text-label mt-2">Update images review (4 pictures)</p>
                                        </label>
                                        <input
                                            class="form-control rounded-0 mb-2"
                                            type="file"
                                            id="product_imgreview"
                                            name="product_imgreview[]"
                                            accept="image/png, image/jpeg, image/jpg"
                                            multiple
                                        >

                                        <label for="product_price">
                                            <p class="text-label mt-2">Product price ($)</p>
                                        </label>
                                        <input
                                            class="form-control rounded-0 fw-500 mb-2"
                                            type="number" min="0" step="0.05"
                                            name="product_price"
                                            id="product_price"
                                            placeholder="00.00"
                                            value="{{$products->product_price}}"
                                            required
                                        >

                                        <label for="product_saleprice">
                                            <p class="text-label mt-2">Product sale price ($)</p>
                                        </label>
                                        <input
                                            class="form-control rounded-0 fw-500 mb-2"
                                            type="number" min="0" step="0.05"
                                            name="product_saleprice"
                                            id="product_saleprice"
                                            placeholder="00.00"
                                            value="{{$products->product_saleprice}}"
                                            required
                                        >

                                        <label for="category_id">
                                            <p class="text-label mt-2" >Product category</p>
                                        </label>
                                        <select
                                            class="form-select rounded-0 mb-2"
                                            aria-label="category select"
                                            name="category_id"
                                            id="category_id"
                                            required
                                            >
                                            <option selected disabled>Select category</option>
                                            @foreach ($categories as $item2)
                                                <option
                                                    value="{{$item2->id}}"
                                                    {{($item2->id == $products->category_id) ? 'selected' : ''}}
                                                    >
                                                    {{$item2->category_name}}
                                                </option>
                                            @endforeach
                                        </select>

                                        <label for="group_id">
                                            <p class="text-label mt-2">Product group</p>
                                        </label>
                                        <select
                                            class="form-select rounded-0 mb-2"
                                            aria-label="group select"
                                            name="group_id"
                                            id="group_id"
                                            required
                                            >
                                            <option selected disabled>Select group</option>
                                            @foreach ($groups as $item3)
                                                <option
                                                    value="{{$item3->id}}"
                                                    {{($item3->id == $products->group_id) ? 'selected' : ''}}
                                                    >
                                                    {{$item3->group_name}}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group mb-2">
                                        <label for="color_id[]"><p class="text-label">Product color</p></label><br>
                                        <input
                                            type="color"
                                            class="form-control form-control-color d-flex w-100 rounded-0 mb-2"
                                            id="product_color"
                                            name="product_color"
                                            value="{{$products->product_color}}"
                                            required
                                        >

                                        <!-- Start Product color and quantity -->
                                        <!--
                                        <label for="color_id[]"><p class="text-label">Product color and quantity</p></label><br>
                                        <div class="border border-1 p-3 mb-2">
                                            <div class="row">
                                                @foreach ($colors as $color)
                                                    @php
                                                        $productColor = Products_Colors::where('product_id', $products->id)->where('color_id', $color->id)->get();
                                                    @endphp

                                                        <div class="col-md-6 mb-2">
                                                            <div class="border border-1 py-2 px-4">
                                                                <div class="row mb-1">
                                                                    <div class="col-md-4">
                                                                        <label for="color_id[]"><p class="text-label">Color: </p></label>
                                                                    </div>

                                                                    <div class="col-md-8">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-check-input colorAll"
                                                                            id="{{$color->color_name}}"
                                                                            value="{{$color->id}}"
                                                                            name="color_id[{{$color->id}}]"
                                                                            @foreach ($productColor as $item)
                                                                                {{($color->id == $item->color_id ) ? 'checked' : ''}}
                                                                            @endforeach
                                                                        >
                                                                        <label class="form-check-label" for="{{$color->color_name}}">
                                                                            <div style="background: {{$color->color_name}}; color: {{$color->color_name}}" class="px-2 ms-1">FFFFF1</div>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label for="color_quantity"><p class="text-label">Quantity: </p></label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input
                                                                            class="form-control rounded-0 w-75 py-0"
                                                                            type="number"
                                                                            min="0"
                                                                            name="color_quantity[{{$color->id}}]"
                                                                            id="color_quantity"
                                                                            placeholder="00"
                                                                            @foreach ($productColor as $item)
                                                                                {{($color->id == $item->color_id ) ? 'value=' .$item->color_quantity : 'value=0'}}
                                                                            @endforeach
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endforeach
                                            </div>

                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" id="color" onclick="javascript:colorAll(this)"/>
                                                <label class="form-check-label text-danger" for="color">Check All</label>
                                            </div>
                                        </div>
                                        -->
                                        <!-- End Product color and quantity -->

                                        <!-- Start Product size and quantity -->
                                        <label for="size"><p class="text-label mt-2">Product size and quantity</p></label><br>
                                        <div class="border border-1 p-3 mb-2">
                                            <div class="row">
                                                @foreach ($sizes as $size)
                                                    @php
                                                        $productSize = Products_Sizes::where('product_id', $products->id)->where('size_id', $size->id)->get();
                                                    @endphp
                                                    <div class="col-md-6 mb-2">
                                                        <div class="border border-1 py-2 px-4">
                                                            <div class="row mb-1">
                                                                <div class="col-md-4">
                                                                    <label for="size"><p class="text-label">Size: </p></label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input
                                                                        type="checkbox"
                                                                        class="form-check-input sizeAll"
                                                                        id="size{{$size->size_number}}"
                                                                        value="{{$size->id}}"
                                                                        name="size_id[{{$size->id}}]"
                                                                        @foreach ($productSize as $item)
                                                                            {{($size->id == $item->size_id ) ? 'checked' : ''}}
                                                                        @endforeach
                                                                    >
                                                                    <label class="form-check-label fw-500" for="size{{$size->size_number}}">
                                                                        {{$size->size_number}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="size_quantity"><p class="text-label">Quantity: </p></label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input
                                                                        class="form-control rounded-0 w-75 py-0"
                                                                        type="number"
                                                                        min="0"
                                                                        name="size_quantity[{{$size->id}}]"
                                                                        id="size_quantity"
                                                                        placeholder="00"
                                                                        @foreach ($productSize as $item)
                                                                            {{($size->id == $item->size_id ) ? 'value=' .$item->size_quantity : 'value=0'}}
                                                                        @endforeach
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="form-check mb-0">
                                                <input type="checkbox"  class="form-check-input" id="size" onclick="javascript:sizeAll(this)"/>
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
                                                Back to list
                                            </a>
                                            <button class="btn btn-primary rounded-0 ms-auto mt-2" type="submit">Update product</button>
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