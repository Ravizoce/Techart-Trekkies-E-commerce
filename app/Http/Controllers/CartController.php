<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class CartController extends Controller
{
    //
    public function index()
    {
        $userCart = Auth::user()->load('cart.product');
        $cartDetails = $userCart->cart;

        return view('pages/cart',[
            "cartDetails" =>$cartDetails
        ]);
    }
    public function store($id)
    {
        try {
            db::beginTransaction();
            $cart = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
            if ($cart) {
                $quantity = $cart->quantity + 1;
                $cart->update([
                    'quantity' =>$quantity,
                ]);

                db::commit();
                return redirect()->back()->with('success', 'Product added to cart!');
            }

            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'quantity' => 1,
            ]);
            db::commit();
            return redirect()->back()->with('success', 'Product added to cart!');
        } catch (Exception $e) {
            db::rollBack();
            return redirect()->back()->with($e->getMessage());
        }
    }
    public function delete(Cart $cart){
        // dd($cart);
        $cart->delete();
        return redirect()->back();
    }
}