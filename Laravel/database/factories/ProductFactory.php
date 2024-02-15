<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->name(),
            'category'=>fake()->name(),
            'color'=>fake()->name(),
            'size'=>fake()->numberBetween(10,100),//'price' => $faker->numberBetween(10, 100),
            'price'=>fake()->numberBetween(10,100),
        ];
    }
}
