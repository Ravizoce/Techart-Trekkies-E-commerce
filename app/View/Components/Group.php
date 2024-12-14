<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Group extends Component
{
    /**
     * Create a new component instance.
     */

    private $category;

    public function __construct(Category $category)
    {
        //
        $this->category = $category;
    }

    public function categories()
    {
        return $this->category->load('product');
    }
    public function render(): View|Closure|string
    {
        return view('components.group');
    }
}
