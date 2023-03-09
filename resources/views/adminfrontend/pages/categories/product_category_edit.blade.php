@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-category-edit/'.$categoryId)}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-6 my-3 mb-md-0">
                    @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
		            @endif

                    <h4 class="mb-2 text-black">Edit Categories</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <div class="col-md-12">
                                        <label for="product_imgcover">
                                            <p class="text-label mt-3">Category Image</p>
                                        </label>
                                        <div class="col-md-12">
                                            <img
                                                src="/product_img/imgcategory/{{$category->category_img}}"
                                                class="img-fluid product-thumbnail"
                                            >
                                        </div>

                                        <label for="category_img">
                                            <p class="text-label mt-3">Update Category Image</p>
                                        </label>
                                        <input
                                            class="form-control rounded-0 mb-2"
                                            type="file"
                                            id="category_img"
                                            name="category_img"
                                            accept="image/png, image/jpeg, image/jpg"
                                        >

                                        <label for="category_name"><p class="text-label">Category name</p></label>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 fw-500 mb-2"
                                            id="category_name"
                                            name="category_name"
                                            value="{{$category->category_name}}"
                                            placeholder="category name..." required
                                        >

                                        <label for="sub_category">
                                            <p class="text-label mt-2">
                                                Sub category :  (Write then press enter to add new sub category)
                                            </p>
                                        </label>
                                        <input
                                            class="form-control rounded-0 fw-500 mb-2"
                                            type="text"
                                            data-role="tagsinput"
                                            name="sub_category"
                                            placeholder="sub category"
                                            value="@foreach ($subCategory as $item){{$item->sub_category. ','}}@endforeach"
                                        >
                                        <label>
                                            <p class="text-label mt-2">
                                                Product group
                                                @if($groups_count == 0)
                                                        <span class="text-label text-danger">(Please create product group before adding category!)</span>
                                                    @else
                                                        <span class="text-label">(Choose product group)</span>
                                                @endif
                                            </p>
                                        </label><br>
                                        @foreach ($groups as $row)
                                            <div class="form-check form-check-inline">
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    id="{{$row->group_name}}"
                                                    value="{{$row->id}}"
                                                    name="group_id[]"
                                                    @foreach ($selected_group as $item)
                                                        {{($row->id == $item->group_id) ? 'checked' : ''}}
                                                    @endforeach
                                                >
                                                <label class="form-check-label" for="{{$row->group_name}}">{{$row->group_name}}</label>
                                            </div>
                                        @endforeach

                                        <div class="d-flex mt-4">
                                            <a class="btn btn-outline-danger rounded-0 mt-3" href="{{url('/admin/product-category-list')}}" role="button">Back to list</a>
                                            <button class="btn btn-primary rounded-0 ms-auto mt-3" type="submit">Update Category</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
@endsection()