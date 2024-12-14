<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user()->load('address');
        return view('pages/profile', [
            "user" => $user
        ]);
    }
    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => "required|email|unique:users,email," . Auth::id(),
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back()->with("message", "Profile details updated");
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('home')->with("message", "Profile delition successful");
    }
    public function address()
    {
        $route = 'address.store';
        return view("form/addressform", [
            'address_id'=>null,
            'route' => $route
        ]);
    }
    public function updateAddressindex(Address $address)
    {

        $address_id = $address->id;
        $route = 'address.update';
        return view("form/addressform", [
            'address' => $address,
            'address_id' => $address_id,
            'route' => $route
        ]);
    }
    public function createAddress(Request $request)
    {
        $request->validate([
            'address_type' => 'required|in:home,work',
            'state' => 'required|string|max:255',
            'zone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone_no' => 'required|string|min:7|max:15|regex:/^[0-9\-]+$/',
            'landmark' => 'nullable|string|max:255',
        ]);
        Address::create([
            "user_id" => Auth::user()->id,
            "address_type" => $request->address_type,
            "state" => $request->address_type,
            "zone" => $request->address_type,
            "city" => $request->address_type,
            "phone_no" => $request->address_type,
            "landmark" => $request->address_type,
        ]);

        return redirect()->route('profile')->with("message", "Address added successfully");
    }
    public function updateAddress(Address $address ,Request $request)
    {
        $validated = $request->validate([
            'address_type' => 'required|in:home,work',
            'state' => 'required|string|max:255',
            'zone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone_no' => 'required|string|min:7|max:15|regex:/^[0-9\-]+$/',
            'landmark' => 'nullable|string|max:255',
        ]);

        $address->update($validated);
    }
    public function deleteAddress(Address $address){
        $address->delete();

        return redirect()->back()->with('message','Address deleted successfully');
    }
}
