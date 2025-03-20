<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 65)->unique();
            $table->string('account_number', 15)->nullable();
            $table->double('sum', 10, 2, true);
            $table->timestamps();
            $table->foreignId('method_id')->constrained('payment_methods');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Define a relação
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
