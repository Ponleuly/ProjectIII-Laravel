<?php
	use App\Models\Categories_Groups;
	use App\Models\Products_Attributes;
	use App\Models\Categories_Subcategories;
    use Illuminate\Support\Carbon;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
        <form  action="{{url('/admin/product-type-add')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- to make form active -->
            <div class="row justify-content-center">
                <div class="col-md-12 my-3 mb-md-0">
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


                    <h4 class="mb-2 text-black">Coupons List</h4>
                    <div class="p-3 p-lg-4 border bg-white">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('/admin/coupon-add')}}"
                                    role="button"
                                    >
                                    Add Coupon
                                </a>
                                <div class="input-group w-25 ms-auto">
                                    <input type="search" class="form-control rounded-0" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="search">
                                    <button class="btn btn-outline-primary rounded-0" type="button" id="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 p-3 p-lg-4 border bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">START DATE</th>
                                    <th scope="col">END DATE</th>
                                    <th scope="col">CAMPAIGN NAME</th>
                                    <th scope="col">CODE</th>
                                    <th scope="col">PERCENTAGE</th>
                                    <th scope="col">VALUE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                                    <tr class="text-center">
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{date('M d, Y', strtotime($coupon->start_date));}}</td>
                                        <td>{{date('M d, Y', strtotime($coupon->end_date));}}</td>
                                        <td>{{$coupon->campaign_name}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->discount_percentage}} %</td>
                                        <td>{{$coupon->discount_value}} $</td>
                                        <td>
                                            @php
                                                $start = date('M d, Y', strtotime($coupon->start_date));
                                                $end = date('M d, Y', strtotime($coupon->end_date));
                                                $current = Carbon::now();
                                                if($current->gt($start) && $current->gt($end)){
                                                    $status = 0; //expired
                                                }elseif($current->gte($start) && $current->lt($end)){
                                                     $status = 1; //active
                                                 }elseif($current->lt($start) && $current->lt($end)){
                                                    $status = 2; //future
                                                }
                                            @endphp
                                            <button
                                                type="button"
                                                class="btn btn-sm py-1 px-2
                                                    {{($status == 0)?  'btn-danger' : ''}}
                                                    {{($status == 1)?  'btn-success' : ''}}
                                                    {{($status == 2)?  'btn-warning' : ''}}
                                                    "
                                                    style="width: 90px"
                                                >
                                                {{($status == 0)? 'Expired':''}}
                                                {{($status == 1)? 'Active':''}}
                                                {{($status == 2)? 'Future':''}}
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 view-btn"
                                                href="{{url('/admin/coupon-view/'.$coupon->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="View Details"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">visibility</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 edit-btn"
                                                href="{{url('/admin/coupon-edit/'.$coupon->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit coupon"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">edit</span>
                                            </a>
                                            <a
                                                class="text-light py-1 pb-0 px-2 rounded-0 delete-btn"
                                                href="{{url('/admin/coupon-delete/'.$coupon->id)}}"
                                                role="button"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Delete coupon"
                                                >
                                                <span class="material-icons-round" style="font-size: 16px">delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <!--- To show data by pagination --->
                            {{$coupons->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection()