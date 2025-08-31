<?php

namespace Database\Seeders;

use App\Models\Labor;
use Illuminate\Database\Seeder;

class LaborSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Labor::factory()->createMany([
            [
                'invoice_id' => 1,
                'service_id' => 1,
                'start_at' => '2024-01-15 09:00:00',
                'end_at' => '2024-01-15 10:00:00',
                'idle_time' => '00:00:00',
                'price' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 1,
                'service_id' => 2,
                'start_at' => '2024-01-15 10:00:00',
                'end_at' => '2024-01-15 11:00:00',
                'idle_time' => '00:00:00',
                'price' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 1,
                'service_id' => 3,
                'start_at' => '2024-01-15 11:00:00',
                'end_at' => '2024-01-15 12:00:00',
                'idle_time' => '00:00:00',
                'price' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 1,
                'service_id' => 4,
                'start_at' => '2024-01-15 12:00:00',
                'end_at' => '2024-01-15 13:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 2,
                'service_id' => 1,
                'start_at' => '2024-01-15 09:00:00',
                'end_at' => '2024-01-15 10:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 2,
                'service_id' => 2,
                'start_at' => '2024-01-15 10:00:00',
                'end_at' => '2024-01-15 11:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 2,
                'service_id' => 3,
                'start_at' => '2024-01-15 11:00:00',
                'end_at' => '2024-01-15 12:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 2,
                'service_id' => 4,
                'start_at' => '2024-01-15 12:00:00',
                'end_at' => '2024-01-15 13:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 3,
                'service_id' => 1,
                'start_at' => '2024-01-15 09:00:00',
                'end_at' => '2024-01-15 10:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 3,
                'service_id' => 2,
                'start_at' => '2024-01-15 10:00:00',
                'end_at' => '2024-01-15 11:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 3,
                'service_id' => 3,
                'start_at' => '2024-01-15 11:00:00',
                'end_at' => '2024-01-15 12:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 3,
                'service_id' => 4,
                'start_at' => '2024-01-15 12:00:00',
                'end_at' => '2024-01-15 13:00:00',
                'idle_time' => '00:00:00',
                'price' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
