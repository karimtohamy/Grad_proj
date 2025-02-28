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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('rater_id'); // The customer/provider giving the rating
            $table->enum('rater_type', ['customer', 'provider']); // Defines who rated
            $table->unsignedBigInteger('rated_id'); // The customer/provider receiving the rating
            $table->enum('rated_type', ['customer', 'provider']); // Defines who is being rated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
