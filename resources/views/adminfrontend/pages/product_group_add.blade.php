@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-group-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row justify-content-center">
                <div class="col-md-6 my-3 mb-md-0">
                    @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                        <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
		            @endif

                    <h4 class="mb-2 text-black">Add product group</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <div class="col-md-12">
                                        <label for="group_name"><p class="text-label">Product group name</p></label>
                                        <input group="text" class="form-control rounded-0 fw-500 mb-2 text-capitalize" id="group_namee" name="group_name" placeholder="group name...">

                                        <div class="d-flex mt-4">
                                            <a class="btn btn-outline-danger rounded-0 mt-3" href="{{url('/admin/product-group-list')}}" role="button">Back to list</a>
                                            <button class="btn btn-primary rounded-0 ms-auto mt-3" group="submit">Add product group</button>
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
@endsection()