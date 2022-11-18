<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name' => $this->faker->slug(),
            'manufacturer' => $this->faker->company(),
            'release' => $this->faker->date(max: '-30 days'),
            'cost' => rand(30, 400),
            'category' => $this->faker->randomElement(['Tvs', 'Mobile phones', 'Laptops', 'Fridges']),

        ];
    }
}
