<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
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
            'product_id' => Product::factory(),
            'invoice_id' => Invoice::factory(),

            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
