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
        Schema::create('dish_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();

            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->primary(['dish_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_ingredient');
    }
};
