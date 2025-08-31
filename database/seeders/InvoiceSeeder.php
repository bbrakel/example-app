<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::factory()->createMany([
            [
                'user_id' => 1,
                'serial' => 1001,
                'date' => '2024-01-15',
                'due_at' => '2024-02-15',
                'paid_at' => '2024-01-20 10:30:00',
                'sent_at' => '2024-01-15 09:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'serial' => 1002,
                'date' => '2024-02-01',
                'due_at' => '2024-03-01',
                'paid_at' => null,
                'sent_at' => '2024-02-01 14:15:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'serial' => 1003,
                'date' => '2024-01-20',
                'due_at' => '2024-02-20',
                'paid_at' => '2024-02-18 16:45:00',
                'sent_at' => '2024-01-20 11:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'serial' => 1004,
                'date' => '2024-03-05',
                'due_at' => '2024-04-05',
                'paid_at' => null,
                'sent_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'serial' => 1005,
                'date' => '2024-02-10',
                'due_at' => '2024-03-10',
                'paid_at' => '2024-03-08 13:20:00',
                'sent_at' => '2024-02-10 08:45:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
