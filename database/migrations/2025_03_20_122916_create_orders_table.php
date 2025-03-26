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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Número do pedido
            $table->decimal('total_price', 10, 2); // Preço total da venda
            $table->string('coupon_code')->nullable(); // Código do cupom
            $table->decimal('discount_amount', 10, 2)->default(0); // Valor do desconto
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Cliente
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade'); // When nulo pendente
            $table->enum('status', ['pending', 'paid', 'canceled'])->default('pending'); // Status da venda
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
