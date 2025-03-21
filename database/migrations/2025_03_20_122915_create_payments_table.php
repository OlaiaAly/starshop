<?php

use App\Enums\PaymentMethod;
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
            $table->enum('method', array_column(PaymentMethod::cases(), 'value'))->default(PaymentMethod::M_PESA->value);            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Define a relação
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
