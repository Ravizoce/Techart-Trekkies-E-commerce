<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     */

    public $selectedBrands = [], $selectedCategories = [], $maxPrice = 50000, $minPrice = 300;

    public function __construct($category = null, $brand = null, $minPrice=null,$maxPrice=null)
    {
        //
        if ($category !== null) {
            $this->selectedCategories = $category;
        }
        if ($brand !== null) {
            $this->selectedBrands = $brand;
        }
        if ($maxPrice !== null) {
            $this->maxPrice = $maxPrice;
        }
        if ($minPrice !== null) {
            $this->minPrice = $minPrice;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */

    public function categories()
    {
        return Category::all();
    }
    public function brands()
    {
        return Brand::all();
    }
    public function products()
    {
        $product = Product::query();
        $product->where(function ($query) {
            $query->when(!empty($this->selectedBrands), function ($query) {
                $query->whereIn('brand_id', $this->selectedBrands);
            })->when(!empty($this->selectedCategories), function ($query) {
                $query->whereIn("category_id", $this->selectedCategories);
            })->when($this->maxPrice || $this->minPrice, function ($query) {
                $query->whereBetween("price", [$this->minPrice, $this->maxPrice]);
            });
        });

        $product =  $product->with(['category', 'brand'])->get();
        return $product;
    }
    public function render(): View|Closure|string
    {
        return view('components.filter', [
            "name" => "harry"
        ]);
    }
}
