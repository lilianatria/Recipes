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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');   
            $table->string('poster');
            $table->text('description');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->unsignedBigInteger('price_id');
            $table->integer('preparation_min');
            $table->integer('cooking_min');      
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('difficulty_id')->references('id')->on('difficulties')->onDelete('cascade');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
