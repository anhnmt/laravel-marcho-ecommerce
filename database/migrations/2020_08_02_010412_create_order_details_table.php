<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->foreignId('product_attribute_id')->nullable();
            $table->integer('quantity');
            $table->float('price', 10);
            $table->timestamps();
            $table->softDeletes();
            //Foreign key
            $table->foreign('order_id')->references('id')->on('orders')
            ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
