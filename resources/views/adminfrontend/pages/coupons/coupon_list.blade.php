<?php
	use App\Models\Categories_Groups;
	use App\Models\Products_Attributes;
	use App\Models\Categories_Subcategories;
    use Illuminate\Support\Carbon;

?>
@extends('adminfrontend.layouts.index')
@section('admincontent')
    <div class="container-fluid">
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
                            <div class="col-md-6">
                                <a
                                    class="btn btn-outline-primary rounded-0"
                                    href="{{url('admin/coupon-add')}}"
                                    role="button">
                                    Add Coupon
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form  action="{{url('admin/coupon-search')}}">
                                    <div class="input-group w-75 ms-auto">
                                        <input
                                            type="text"
                                            name="search_coupon"
                                            class="form-control rounded-0"
                                            placeholder="Enter campaign name here..."
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
                                <tr class="text-center text-light bg-primary">
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
                                    <tr class="text-center admin-table">
                                        <th scope="row">{{$count++}}</th>
                                        <td class="col-2">{{date('M d, Y', strtotime($coupon->start_date));}}</td>
                                        <td class="col-2">{{date('M d, Y', strtotime($coupon->end_date));}}</td>
                                        <td>{{$coupon->campaign_name}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->discount_percentage}} %</td>
                                        <td>{{$coupon->discount_value}} $</td>
                                        <td>
                                            @php
                                            /*
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
                                            */
                                            @endphp
                                            <button
                                                type="button"
                                                class="btn btn-sm py-1 px-2
                                                    {{($coupon->coupon_status == 0)?  'btn-danger' : ''}}
                                                    {{($coupon->coupon_status == 1)?  'btn-success' : ''}}
                                                    {{($coupon->coupon_status == 2)?  'btn-warning' : ''}}
                                                    "
                                                    style="width: 90px"
                                                >
                                                {{($coupon->coupon_status == 0)? 'Expired':''}}
                                                {{($coupon->coupon_status == 1)? 'Active':''}}
                                                {{($coupon->coupon_status == 2)? 'Future':''}}
                                            </button>
                                        </td>
                                        <td class="text-center col-2">
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
                            @if($search_text == '')
                                <!--- To show data by pagination --->
                                {{$coupons->links()}}
                                @else
                                    <div class="d-flex mt-4" style="padding-top: 2px">
                                        <a
                                            class="btn btn-outline-danger rounded-0 mt-2"
                                            href="{{url('admin/coupon-list')}}"
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