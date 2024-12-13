<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => $this->faker->numberBetween(300, 50000),
            'brand' => $this->faker->company,
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'image_url' => $this->faker->imageUrl(640, 480, 'products', true, 'product'),
            'volume' => $this->faker->numberBetween(250, 500),
            'alcohol_percentage' => $this->faker->numberBetween(5, 50),
            'description' => $this->faker->paragraph,
            'category_id' => Category::inRandomOrder()->first()->id, // Get a random category ID
        ];
    }
}
