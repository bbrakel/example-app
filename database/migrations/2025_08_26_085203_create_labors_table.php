<?php

use App\Models\Invoice;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('labors', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->time('idle_time')->nullable();
            $table->integer('price')->nullable();

            $table->foreignIdFor(Invoice::class);
            $table->foreignIdFor(Service::class);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('labors');
    }
};
