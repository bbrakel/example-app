<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::factory(),

            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100, 10000),
            'brand' => $this->faker->company(),
            'sku' => $this->faker->unique()->numerify('####-####'),
            'quantity' => $this->faker->numberBetween(1, 100),
            'barcode' => $this->faker->unique()->numerify('#########'),
        ];
    }
}
