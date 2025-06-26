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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id('shipment_id');

            $table->bigInteger('order_id');

            // Informasi pengiriman
            $table->string('recipient_name');
            $table->string('recipient_phone');

            // Detail alamat
            $table->string('address_line');     // Jalan / detail alamat
            $table->string('province');
            $table->string('regencies');
            $table->string('districts');
            $table->string('villages');
            $table->string('postal_code');

            // Informasi shipment
            $table->string('tracking_number')->nullable();
            $table->string('courier')->nullable();
            $table->string('status')->default('processing'); // Bisa pakai enum

            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
