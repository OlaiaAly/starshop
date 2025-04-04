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
        $userTableName = config('laravel-cart.users.table', 'users');
        $userForeignName = config('laravel-cart.users.foreign_id', 'user_id');
        $table = config('laravel-cart.carts.table', 'carts');

        Schema::create($table, function (Blueprint $table) use ($userTableName, $userForeignName) {
            $table->id();
            $table->decimal('total', 8, 2)->default(0.0);
            $table->decimal('total_discount', 8, 2)->nullable();//MT
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->onDelete('set null'); // Cupom aplicado ao carrinho
            $table->foreignId($userForeignName)->constrained($userTableName)->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table = config('laravel-cart.carts.table', 'carts');

        Schema::dropIfExists($table);
    }
};
