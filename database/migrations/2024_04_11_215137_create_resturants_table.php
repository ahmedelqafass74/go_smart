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
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->longText('description')->nullable();
            $table->longText('image')->nullable();
            $table->string('resturant_name')->nullable();
            $table->string('rating')->nullable();
            $table->text('website')->nullable();
            // $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resturants');
    }
};
