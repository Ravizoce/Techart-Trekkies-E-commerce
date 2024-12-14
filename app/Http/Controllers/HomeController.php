<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $AllCategories = Category::get()->all();
        $categories = Category::inRandomOrder()->take(3)->get();

        return view('pages/home', [
            'categories' => $categories,
            "AllCategories" => $AllCategories,
        ]);
    }

    public function Filter(Request $request)
    {

        $category = $request->has('category') ? $request->category : null;
        $brand = $request->has('brand')? $request->brand : null;
        $minPrice = $request->has('minPrice')? $request->minPrice : null;
        $maxPrice = $request->has('maxPrice')? $request->maxPrice : null;
        return view('pages/filter', [
           "category" =>$category, 
           "brand"=>$brand, 
           "minPrice"=>$minPrice, 
           "maxPrice"=>$maxPrice, 
        ]);
    }

    // public function productDetailes(Product $id){

    //     return view("pages/detailes");

    // }
}
