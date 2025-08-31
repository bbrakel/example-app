<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->createMany([
            [
                'user_id' => 1,
                'name' => 'Product 1',
                'price' => 100,
                'brand' => 'Brand 1',
            ],
            [
                'user_id' => 1,
                'name' => 'Product 2',
                'price' => 200,
                'brand' => 'Brand 2',
            ],
            [
                'user_id' => 1,
                'name' => 'Product 3',
                'price' => 300,
                'brand' => 'Brand 3',
            ],
        ]);
    }
}
