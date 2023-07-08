<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('user.register');
    }

    public function register_req(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $data = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data->save();

        return redirect()->route('login')->with('success', 'Registration Berhasil');
    }

    public function login(){
        return view('user.login');
    }

    public function login_req(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau password salah');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
