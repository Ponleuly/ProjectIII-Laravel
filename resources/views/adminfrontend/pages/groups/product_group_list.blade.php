<?php
	use App\Models\Categories_Groups;
?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
                    @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                            {{Session::get('alert')}}
                            <button group="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
		            @endif

                    <h4 class="mb-2 text-black">Groups List</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/product-group-add')}}"
                                    role="button">
                                    Add Group
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/product-group-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_group"
                                            class="form-control rounded-0"
                                            placeholder="Enter group title here..."
                                            aria-label="Recipient's username"
                                            aria-describedby="search"
                                            value="{{$search_text}}"
                                        >
                                        <button
                                            class="btn btn-outline-primary rounded-0"
                                            type="submit"
                                            id="search"
                                            >
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 p-3 p-lg-4 border bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-primary text-light text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">GROUP</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groups as $row)
                                    <tr class="text-center">
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$row->group_name}}</td>
                                        <td>
                                            @php
                                                $category_count = Categories_Groups::where('group_id', $row->id)->count();
                                            @endphp
                                            {{$category_count}}
                                        </td>
                                        <td>{{$row->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                                href="{{url('/admin/product-group-edit/'.$row->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Product"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">edit</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                                href="{{url('/admin/product-group-delete/'.$row->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Delete Product"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            @if($search_text != '')
                                <div class="d-flex mt-4" style="padding-top: 2px">
                                    <a
                                        class="btn btn-outline-danger rounded-0 mt-2"
                                        href="{{url('admin/product-group-list')}}"
                                        role="button"
                                        >
                                        Back to List
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection()