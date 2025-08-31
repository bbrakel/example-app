<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Invoice;
use App\Models\Labor;
use App\Models\Product;
use App\Models\Service;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $products = Product::factory()
            ->for($user)
            ->count(5)
            ->create();

        $services = Service::factory()
            ->for($user)
            ->count(5)
            ->create();

        Invoice::factory(10)
            ->recycle([$user])
            ->has(Labor::factory(3)->recycle([$services, $user]))
            ->has(Stock::factory(3)->recycle([$products, $user]))
            ->create();

        Labor::factory(5, ['invoice_id' => null])
            ->recycle([$user, $services])
            ->create();

        Stock::factory(5, ['invoice_id' => null])
            ->recycle([$user, $products])
            ->create();
    }
}
