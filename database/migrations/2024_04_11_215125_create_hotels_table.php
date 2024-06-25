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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->longText('image1')->nullable();
            $table->longText('image2')->nullable();
            $table->longText('image3')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('rating')->nullable();
            $table->text('url_google_map')->nullable();
            $table->text('website')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
