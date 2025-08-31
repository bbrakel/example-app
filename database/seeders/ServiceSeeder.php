<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'user_id' => 1,
                'name' => 'Cleaning',
                'price' => 100,
                'description' => 'Cleaning the house',
            ],
            [
                'user_id' => 1,
                'name' => 'Maintenance',
                'price' => 50,
                'description' => 'Maintenance of the house',
            ],
            [
                'user_id' => 1,
                'name' => 'Gardening',
                'price' => 100,
                'description' => 'Gardening of the house',
            ],
            [
                'user_id' => 1,
                'name' => 'Painting',
                'price' => 200,
                'description' => 'Painting of the house',
            ],
        ]);
    }
}
