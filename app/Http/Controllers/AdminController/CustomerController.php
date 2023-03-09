<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_list()
    {
        $customers = Customers::orderBy('id')->paginate(10);
        $count = 1;
        return view(
            'adminfrontend.pages.customers.customer_list',
            compact(
                'customers',
                'count'
            )

        );
    }
    public function customer_member_list()
    {
        $members = User::orderBy('id')->where('role', 1)->paginate(10);
        $count = 1;
        return view(
            'adminfrontend.pages.customers.member_list',
            compact(
                'members',
                'count'
            )

        );
    }

    public function customer_subscriber_list()
    {
        $subscribers = Subscribers::orderBy('id')->paginate(10);
        $count = 1;
        return view(
            'adminfrontend.pages.customers.subscriber_list',
            compact(
                'subscribers',
                'count'
            )

        );
    }
}
