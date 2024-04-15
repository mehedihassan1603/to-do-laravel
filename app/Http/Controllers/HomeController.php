<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function Index (){
        return view('login');
    }

    public function Login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            Toastr::success('Your are Login to your account.', 'Login Successfull!', ["positionClass" => "toast-top-right"]);
            return redirect()->intended('/');
        }
        Toastr::error('Enter email and password correctly.', 'Login Failed!', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function RegisterView (){
        return view('register');
    }
    public function Register(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|confirmed'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        Toastr::success('Registration successful! Please log in.', 'Success!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }

    public function Logout(){
        Auth::logout();
        Toastr::success('You have been logged out.', 'Logout Successfully', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }
}
