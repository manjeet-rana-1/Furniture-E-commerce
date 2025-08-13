<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('add_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->decimal( 'product_price', 10, 2);
            $table->text('product_description');
            $table->integer('product_quantity');
            $table->string('product_category');
            $table->string('product_image')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('add_products');
    }
};
