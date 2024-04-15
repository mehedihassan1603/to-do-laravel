<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
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

        return redirect()->route('index')->with('message', 'Registration successful! Please log in.');
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('index')->with('message', 'You have been logged out.');
    }
}
