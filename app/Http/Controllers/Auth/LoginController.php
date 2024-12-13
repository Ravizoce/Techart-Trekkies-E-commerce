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
    public function login(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            if(Auth::user()->role == UserType::User){
                return redirect()->intended(route('home', absolute: false))->with("success", "login successful, Welcome" . Auth::user()->name);
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'sorry, Login failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
