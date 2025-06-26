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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('invoice');
            $table->string('username');
            $table->string('email');
            $table->integer('amount');
            $table->integer('weight');
            $table->date('order_date');
            $table->time('order_time');
            $table->integer('type');
            $table->enum('status', ['pending', 'waiting', 'process', 'shipment', 'pickup', 'completed', 'cancle'])->default('pending');
            $table->string('payment_method');
            $table->text('note');
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
