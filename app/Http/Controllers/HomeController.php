<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function Filter()
    {
        return view('components/filter');
    }
}
