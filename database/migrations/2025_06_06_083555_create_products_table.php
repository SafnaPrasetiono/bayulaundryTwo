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
            $table->id('product_id');
            $table->string('title');
            $table->string('slug');
            $table->decimal('price', 12, 2)->default(0); 
            $table->integer('stock')->default(0);
            $table->decimal('weight', 8, 2)->nullable();
            
            $table->longText('description')->nullable();
            $table->text('description_short')->nullable();
            $table->json('description_list')->nullable();
            
            $table->float('discount')->nullable();
            $table->decimal('discount_price', 12, 2)->nullable();
            $table->date('discount_expired')->nullable();
            
            $table->integer('type')->default(0);
            $table->boolean('is_active')->default(true); 
            $table->string('images');
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
