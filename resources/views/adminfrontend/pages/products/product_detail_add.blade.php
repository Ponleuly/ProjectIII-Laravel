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
                                        <textarea class="form-control rounded-0 fw-500" placeholder="product description..." name="product_des" id="product_des"></textarea>

                                        <label for="product_imgcover"><p class="text-label mt-3">Image cover (1 picture)</p></label>
                                        <input class="form-control rounded-0 mb-2" type="file" id="product_imgcover" name="product_imgcover" accept="image/png, image/jpeg, image/jpg" required>

                                        <label for="product_imgreview"><p class="text-label mt-2">Images review (4 pictures)</p></label>
                                        <input class="form-control rounded-0 mb-2" type="file" id="product_imgreview" name="product_imgreview[]" accept="image/png, image/jpeg, image/jpg" multiple required>

                                        <label for="product_price"><p class="text-label mt-2">Product price ($)</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" step="0.05" name="product_price" id="product_price" placeholder="00.00" required>

                                        <label for="product_saleprice"><p class="text-label mt-2">Product sale price ($)</p></label>
                                        <input class="form-control rounded-0 fw-500 mb-2" type="number" step="0.05" name="product_saleprice" id="product_saleprice" placeholder="00.00" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group mb-2">
                                        <div class="col-md-12 mb-2">
                                            <label for="product_stock"><p class="text-label">Product total stock</p></label>
                                            <input class="form-control rounded-0 fw-500" type="number" min="1" name="product_stock" id="product_stock" placeholder="00" required>
                                        </div>

                                        <label for="category_id" ><p class="text-label mt-2" >Product category</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="category select" name="category_id" id="category_id" required>
                                            <option selected disabled>Select category</option>
                                            @foreach ($product_categories as $item2)
                                                <option value="{{$item2->id}}">{{$item2->category_name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="group_id"><p class="text-label mt-2">Product group</p></label>
                                        <select class="form-select rounded-0 mb-2" aria-label="group select" name="group_id" id="group_id" required>
                                            <option selected disabled>Select group</option>
                                            @foreach ($product_groups as $item3)
                                                <option value="{{$item3->id}}">{{$item3->group_name}}</option>
                                            @endforeach
                                        </select>

                                        <div class="mb-2">
                                            <label for="color_id"><p class="text-label mt-2">Product color</p></label><br>
                                            @foreach ($product_colors as $row)
                                                <div class="form-check form-check-inline all">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input colorAll"
                                                        id="{{$row->color_name}}"
                                                        value="{{$row->id}}"
                                                        name="color_id[]"
                                                        @if ($loop->first)
                                                            checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label mt-0" for="{{$row->color_name}}">
                                                        <div class="color-choose" style="background: {{$row->color_name}}"></div>
                                                    </label>
                                                </div>
                                            @endforeach
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="color" onclick="javascript:colorAll(this)"/>
                                                <label class="form-check-label text-danger" for="color">Check All</label>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="size_id"><p class="text-label mt-1">Product size</p></label><br>
                                            @foreach ($product_sizes as $item1)
                                                <div class="form-check form-check-inline all">
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input sizeAll"
                                                        id="size{{$item1->size}}"
                                                        value="{{$item1->id}}"
                                                        name="size_id[]"
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

                                        <div class="d-flex mt-4" style="padding-top: 2px">
                                            <a
                                                class="btn btn-outline-danger rounded-0 mt-2"
                                                href="{{url('/admin/product-category-list')}}"
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