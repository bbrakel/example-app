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
            $table->foreignIdFor(Service::class);
            $table->foreignIdFor(Invoice::class)->nullable();

            $table->time('idle')->nullable();
            $table->integer('price')->nullable();

            $table->timestamp('end_at');
            $table->timestamp('start_at');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('labors');
    }
};
