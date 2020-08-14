<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 15);
            $table->decimal('sale_price', 15)->nullable();
            $table->boolean('status')->default(0);
            // $table->decimal('length')->nullable();
            // $table->decimal('width')->nullable();
            // $table->decimal('height')->nullable();
            // $table->decimal('weight')->default(0);
            $table->timestamps();
            // Foreign Key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
