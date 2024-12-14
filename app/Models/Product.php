<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    /**
     * @use <\Database\Factories\UserFactory> 
     */

     use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'brand',
        'stock_quantity',
        'image_url',
        'volume',
        'alcohol_percentage',
        'description',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
