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
            $table->string('phone', 15)->nullable();
            $table->double('sum', 10, 2, true);
            $table->timestamps();
            $table->string('address'); // Endereço do pagador
            $table->string('province'); // Endereço do pagador
            $table->string('name'); // Nome completo do pagador
            $table->string('email'); // Email do pagador
            $table->string('aditional_info')->nullable(); // Endereço do pagador
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
