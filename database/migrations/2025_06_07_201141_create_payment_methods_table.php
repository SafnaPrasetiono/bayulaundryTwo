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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id('payment_method_id');
            $table->string('name');               // Contoh: Bank Transfer, QRIS, OVO, DANA
            $table->string('code')->unique();     // Contoh: BCA, QRIS, OVO, DANA
            $table->enum('type', ['bank', 'ewallet', 'qris', 'va', 'other']); // Jenis pembayaran
            $table->string('logo')->nullable();   // Path atau URL logo
            $table->boolean('is_active')->default(true); // Aktif/tidak untuk ditampilkan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
