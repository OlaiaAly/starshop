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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->unsignedInteger('product_qty')->default(0);
            $table->string('product_tags')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('selling_price');
            $table->decimal('discount_price', 8,2)->nullable();
            $table->text('short_descp');
            $table->text('long_descp');
            // $table->string('productthambnail');
            $table->string('vendor_id')->nullable();
            // $table->integer('hot_deals')->nullable();
            // $table->integer('featured')->nullable();
            // $table->integer('special_offer')->nullable();
            // $table->integer('special_deals')->nullable();
            $table->string('status')->defualt(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
