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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id('user_address_id');
            $table->string('username');
            $table->string('phone', 14)->nullable();
            $table->string('province');
            $table->string('regencies');
            $table->string('districts');
            $table->string('villages');
            $table->text('detail'); 
            $table->string('postal_code')->nullable();
            $table->boolean('is_primary')->default(false);
            // FOREIGN_KEY
            $table->char('province_id', 2);
            $table->char('regencies_id', 4);
            $table->char('districts_id', 7);
            $table->char('villages_id', 11);
            $table->bigInteger('user_id')->nullable()->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
