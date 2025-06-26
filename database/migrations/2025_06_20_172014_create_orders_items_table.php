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
        Schema::create('orders_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('qty');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->string('discount')->nullable();
            $table->integer('weight')->nullable();
            $table->string('images');
            $table->float('total');
            $table->string('note')->nullable();

            $table->bigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_items');
    }
};
