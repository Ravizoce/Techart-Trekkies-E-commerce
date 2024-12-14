<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = [
            'Ruslan Vodka',
            'Khukuri Rum',
            'Old Durbar Whisky',
            'Nepal Ice Beer',
            'Tuborg Beer',
            'Everest Beer',
            'Royal Stag Whisky',
            'Golden Oak Whisky',
            'Red Bull Rum',
            'McDowell\'s No. 1 Whisky',
        ];
        return [
            //
            'name' => $this->faker->unique()->randomElement($brands),
            'slug' => fake()->unique()->slug(),
            // 'created_by' => fake()->unique(),
            
        ];
    }
}
