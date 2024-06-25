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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('name_place');
            $table->string('name_hotel');
            $table->string('name_rest');
            $table->float('price');
            $table->integer('day');
            $table->float('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        if (Schema::hasTable('recommendations')) {
            Schema::dropIfExists('recommendations');
        }

        Schema::enableForeignKeyConstraints();
    }
};
