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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Relaciona com a venda
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relaciona com o produto
            $table->integer('quantity'); // Quantidade do item comprado
            $table->decimal('price', 10, 2); // Preço unitário do item no momento da venda
            $table->json('options')->nullable();  // For more complex options (JSON)            
            $table->decimal('subtotal', 10, 2); // Preço total do item no momento da venda
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_items');
    }
};
