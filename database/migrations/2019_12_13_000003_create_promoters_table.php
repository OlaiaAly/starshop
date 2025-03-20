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
        Schema::create('promoters', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do promotor
            $table->string('email')->unique()->nullable(); // Email (opcional)
            $table->string('phone')->unique(); // Telefone de contato
            $table->string('document_number')->unique(); // NIF/BI/Passaporte
            $table->string('address')->nullable(); // Endereço
            $table->decimal('commission_rate', 5, 2)->default(0); // Comissão em %
            $table->integer('sales_count')->default(0); // Total de vendas feitas
            $table->decimal('total_earnings', 10, 2)->default(0); // Ganhos acumulados
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active'); // Status
            $table->string('password'); // Senha
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promoters');
    }
};
