<?php

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table): void {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Contact::class);

            $table->date('date');

            $table->integer('serial');
            $table->unique(['serial', 'user_id']);

            $table->timestamp('due_at');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('sent_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
