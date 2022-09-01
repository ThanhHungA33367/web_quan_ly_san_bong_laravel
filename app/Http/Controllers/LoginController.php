<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('field.index');
        }
        else {
            return view('manager.login');
        }

    }
    public function postLogin(LoginRequest $request){
       $login = [
           'email'=>$request->email,
           'password'=>$request->password,
       ];
        if (Auth::attempt($login)) {
            return redirect()->route('field.index');
        }
        else{
            return redirect()->back()->with('Email hoặc Password không chính xác');
        }

    }
    public function Logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
