<?php

namespace App\Http\Controllers\UserController;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }
    public function userRegister(Request $request)
    {
        $input = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'regex:/(01)[0-9]{9}/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($input) {
            $input['password'] = bcrypt($request->password);
            User::create($input);
            //==== Auto Sign in after register ===//
            $arr = [
                'email' => $request->email,
                'password' => $request->password
            ];
            Auth::attempt($arr);
            //=====================================//
        } else {
            return redirect()->back();
        }
        return redirect()->back()
            ->with('alert', 'You are signed up successfully !');
    }

    //================= Login  ===========================//
    public function userLogin()
    {
        return view('frontend.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($arr) && Auth::user()->role == 1) {
            return redirect('home');
        } else {
            return redirect('login')
                ->with('alert', 'Login failed ! Invalid email or password.');
        }
    }
    public function userLogout()
    {
        Auth::logout();
        return redirect('home');
    }
    public function profile_update(Request $request, $id)
    {
        /*
        $input = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'regex:/(01)[0-9]{9}/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        */
        $update_user = User::where('id', $id)->first();
        $update_user->name = $request->input('name');
        $update_user->phone = $request->input('phone');
        $update_user->email = $request->input('email');
        $update_user->address = $request->input('address');
        $update_user->update();
        return redirect('profile')
            ->with('alert', 'Profile updated successfully !');


        //return dd($request->toArray());
    }
    public function change_password()
    {
        return view('frontend.auth.changepassword');
    }
    public function update_password(Request $request, $id)
    {

        $password_validate = $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'current_password' => ['required', 'string', 'min:8'],

        ]);

        if ($password_validate) {
            $user = User::where('id', $id)->first();
            $password = $user->password;
            $input = $request->all();
            if (Hash::check($input['current_password'], $password)) {
                $user['password'] = bcrypt($input['password']);
                $user->update();
            } else {
                return redirect()->back()->with('alert', 'Current password does not matched !');
            }
        } else {
            return redirect()->back();
        }

        return redirect('profile')
            ->with('alert', 'Password has been changed successfully !');
    }
}
