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
        Schema::create('content_banners', function (Blueprint $table) {
            $table->id('banners_id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('linked')->nullable();
            $table->string('linkedText')->nullable();
            $table->string('imagesPath')->nullable();
            $table->string('imagesDesktop')->nullable();
            $table->string('imagesMobile')->nullable();
            $table->string('textPosition')->nullable();
            $table->string('textColor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_banners');
    }
};
