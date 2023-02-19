@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        @if(Session::has('alert'))
            <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                {{Session::get('alert')}}
                <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
		@endif

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

                                        <label for="product_code"><p class="text-label mt-2">Product code</p></label>
                                        <input type="text" class="form-control rounded-0 fw-500 mb-2" id="product_code" name="product_code" placeholder="product code..." required>

                                        <label for="product_des"><p class="text-label mt-2">Description</p></label>
                                        <textarea class="form-control rounded-0 fw-500" placeholder="product description..." name="product_des" id="product_des"></textarea>

                                        <label for="product_imgcover"><p class="text-label mt-3">Image cover (1 picture)</p></label>
                                        <input class="form-control rounded-0 mb-2" type="file" id="product_imgcover" name="product_imgcover" accept="image/png, image/jpeg, image/jpg" required>

                                        <label for="product_imgreview"><p class="text-label mt-2">Images review (4 pictures)</p></label>
                                        <input class="form-control rounded-0 mb-2" type="file" id="product_imgreview" name="product_imgreview[]" accept="image/png, image/jpeg, image/jpg" multiple required>

                                        <label for="product_price"><p class="text-label mt-2">Product price ($)</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" min="0" step="0.05" name="product_price" id="product_price" placeholder="00.00" required>

                                        <label for="product_saleprice"><p class="text-label mt-2">Product sale price ($)</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" min="0" step="0.05" name="product_saleprice" id="product_saleprice" placeholder="00.00" required>
                                        <!--
                                        <label for="product_stock"><p class="text-label mt-2">Product total stock</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" min="1" name="product_stock" id="product_stock" placeholder="00" required>
                                        -->


                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group mb-2">

                                        <label for="category_id" ><p class="text-label" >Product category</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="category select" name="category_id" id="category_id" required>
                                                <option selected disabled>Select category</option>
                                            @foreach ($categories as $item2)
                                                <option value="{{$item2->id}}">{{$item2->category_name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="group_id"><p class="text-label mt-2">Product group</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="group select" name="group_id" id="group_id" required>
                                                <option selected disabled>Select group</option>
                                            @foreach ($groups as $item3)
                                                <option value="{{$item3->id}}">{{$item3->group_name}}</option>
                                            @endforeach
                                        </select>

                                        <!-- Start Product color and quantity -->
                                        <label for="color_id[]"><p class="text-label mt-2">Product color and quantity</p></label><br>
                                        <!--
                                        <div class="border border-1 p-3 mb-2">
                                            <div class="row">
                                                @foreach ($colors as $row)
                                                    <div class="col-md-6 mb-2">
                                                        <div class="border border-1 py-2 px-3">
                                                            <div class="row mb-1">
                                                                <div class="col-md-4">
                                                                    <label for="color_id[]"><p class="text-label">Color: </p></label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input
                                                                        type="checkbox"
                                                                        class="form-check-input colorAll"
                                                                        id="{{$row->color_name}}"
                                                                        value="{{$row->id}}"
                                                                        name="color_id[{{$row->id}}]"
                                                                        @if ($loop->first)
                                                                            checked
                                                                        @endif
                                                                    >
                                                                    <label class="form-check-label" for="{{$row->color_name}}">
                                                                        <div style="background: {{$row->color_name}}; color: {{$row->color_name}}" class="px-2 ms-1">FFFFFF1</div>
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
                                                                        name="color_quantity[{{$row->id}}]"
                                                                        id="color_quantity"
                                                                        placeholder="00"
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
                                        <input type="color" class="form-control form-control-color d-flex w-100 rounded-0 mb-2" id="product_color" name="product_color"  value="#c5c5c5" placeholder="product name..." required>
                                        <!-- End Product color and quantity -->

                                        <!-- Start Product size and quantity -->
                                        <label for="size"><p class="text-label mt-2">Product size and quantity</p></label><br>
                                        <div class="border border-1 p-3 mb-2">
                                            <div class="row">
                                                 @foreach ($sizes as $item1)
                                                    <div class="col-md-4 mb-2">
                                                        <div class="border border-1 py-2 px-3">
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
                                                <input type="checkbox"  class="form-check-input" id="size" onclick="javascript:sizeAll(this)"/>
                                                <label class="form-check-label text-danger ms-1" for="size">Check All</label>
                                            </div>
                                        </div>
                                        <!-- End Product size and quantity -->

                                        <!-- Start Product size and quantity -->
                                        <!--
                                        <div class="mb-2">
                                            <label for="size_id[]"><p class="text-label">Product size and quantity</p></label><br>
                                            @foreach ($sizes as $item1)
                                                <div class="form-check form-check-inline all">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input sizeAll"
                                                        id="size{{$item1->size}}"
                                                        value="{{$item1->size}}"
                                                        name="size[]"
                                                        @if ($loop->first)
                                                            checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label" for="size{{$item1->size}}">
                                                        {{$item1->size}}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <input type="checkbox"  class="form-check-input" id="size" onclick="javascript:sizeAll(this)"/>
                                            <label class="form-check-label text-danger ms-1" for="size">Check All</label>
                                        </div>
                                        -->
                                        <!-- End Product size and quantity -->

                                        <div class="d-flex mt-4" style="padding-top: 2px">
                                            <a
                                                class="btn btn-outline-danger rounded-0 mt-2"
                                                href="{{url('/admin/product-detail-list')}}"
                                                role="button"
                                                >
                                                Back to list
                                            </a>
                                            <button class="btn btn-primary rounded-0 ms-auto mt-2" type="submit">Add product</button>
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