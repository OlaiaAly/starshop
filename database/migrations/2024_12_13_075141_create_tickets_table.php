<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->dateTime('event_date');
            $table->string('location'); 
            $table->decimal('price_normal', 8, 2);
            $table->decimal('price_vip', 8, 2)->nullable();
            $table->integer('quantity_normal');
            $table->integer('quantity_vip')->nullable();
            $table->text('description');
            $table->integer('status')->default(0);
            $table->string('vendor_id');
            $table->string('slug')->unique();
            $table->enum('event_type', ['SHOW', 'FESTIVAL', 'CONCERTO', 'KARAOKE', 'BANDA'])->default('SHOW'); // Enum para tipos de eventos musicais
            // $table->string('category_id');
            // $table->string('subcategory_id');
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
