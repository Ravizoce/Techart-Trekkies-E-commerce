<?php

namespace App\Http\Controllers\Auth;

use App\enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index(){
        return view('Auth/login');
    }
    public function login(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            if(Auth::user()->role == "user"){
                return redirect()->intended(route('home', absolute: false))->with("success", "login successful");
            }

        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
}
