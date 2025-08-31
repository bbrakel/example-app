<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Labor>
 */
class LaborFactory extends Factory
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
            'service_id' => Service::factory(),
            'invoice_id' => Invoice::factory(),

            'idle' => $this->faker->optional()->time(),
            'price' => $this->faker->optional()->numberBetween(10, 1000),

            'end_at' => $this->faker->dateTime(),
            'start_at' => $this->faker->dateTime(),
        ];
    }
}
