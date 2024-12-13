<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Category::class;

    public function definition(): array
    {
        $alcoholCategories = [
            'Whiskey',
            'Vodka',
            'Beer',
            'Wine',
            'Rum',
            'Tequila',
            'Gin',
            'Cider',
            'Champagne',
            'Liqueur',
            'Brandy',
            'Mead'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($alcoholCategories),
            'slug' => fake()->unique()->slug(),
            'created_by' => fake()->unique()->slug(),

        ];
    }
}
