<?php

namespace App\Http\Controllers\Auth;

use App\enum\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('Auth/register');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|unique:" . User::class,
            "password" => "required|min:8|max:16",
            "confirm_password" => "required|same:password"
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember' => $request->remember,
                'role'=>'user'
            ]);

            DB::commit();
            Auth::login($user);

           
            if(Auth::user()->role == "user"){
                return redirect()->intended(route('home', absolute: false))->with("success", "User registration successful");
            }

            
        } catch (Exception $e) {

            DB::rollback();

            return back()->withErrors($e->getMessage());
        }
    }
}
