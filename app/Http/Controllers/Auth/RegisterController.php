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
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|unique:" . User::class,
            "password" => "required|min:8|max:16"
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember' => $request->remember
            ]);

            Auth::login($user);

            if(Auth::user()->role == UserType::User){
                return redirect()->intended(route('home', absolute: false))->with("success", "login successful, Welcome" . Auth::user()->name);
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return response()->json([
                'message' => 'An error occurred during the operation.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
