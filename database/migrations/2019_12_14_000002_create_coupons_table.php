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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Código do cupom
            $table->decimal('discount', 10, 2); // Valor ou percentual de desconto (%)
            $table->enum('type', ['fixed', 'percentage'])->default('percentage'); // Tipo do desconto
            $table->foreignId('promoter_id')->nullable()->constrained('promoters')->onDelete('set null'); // Promotor responsável
            $table->integer('usage_limit')->nullable(); // Limite de uso
            $table->integer('times_used')->default(0); // Número de vezes utilizado
            $table->timestamp('expires_at')->nullable(); // Data de validade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
