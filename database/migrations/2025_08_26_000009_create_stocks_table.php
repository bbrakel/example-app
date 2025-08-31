<?php

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table): void {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Invoice::class)->nullable();

            $table->integer('quantity');
            $table->integer('price');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
