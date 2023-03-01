@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/order-status-edit/'.$order_status_option->id)}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-6 my-3 mb-md-0">
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
                    <h4 class="mb-2 text-black">Add Status Option</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <div class="col-md-12">
                                        <label for="status"><p class="text-label">Status Name</p></label>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 fw-500 mb-2 text-capitalize"
                                            id="status"
                                            name="status"
                                            value="{{$order_status_option->status}}"
                                            placeholder="Status..."
                                        >

                                        <div class="d-flex mt-4">
                                            <a
                                                class="btn btn-outline-danger rounded-0 mt-3"
                                                href="{{url('admin/order-status-option')}}"
                                                role="button"
                                                >
                                                Back to list
                                            </a>
                                            <button
                                                class="btn btn-primary rounded-0 ms-auto mt-3"
                                                type="submit"
                                                >
                                                Update Status
                                            </button>
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