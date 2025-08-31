<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
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
            'contact_id' => Contact::factory(),
            'date' => $this->faker->date(),
            'serial' => $this->faker->unique()->numberBetween(1000, 9999),
            'due_at' => $this->faker->dateTime(),
            'paid_at' => $this->faker->optional()->dateTime(),
            'sent_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
