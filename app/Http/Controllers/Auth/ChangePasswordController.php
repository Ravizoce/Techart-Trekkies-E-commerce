<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change(Request $request)
    {

        $request->validate([
            "password" => "required|min:8|max:16",
            "confirm_password" => "required|same:password"
        ]);
        $user = Auth::user();
        $user->update([
            "password" => Hash::make($request->password)
        ]);

        return redirect()->back()->with("message", "Password update successful");
    }
}
