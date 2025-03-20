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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_provider_id')->constrained('service_providers');
            $table->foreignId('cutomer_id')->constrained('customers');
            $table->enum('status',['pending','accepted','cancled','declined','complete']);
            $table->decimal('price')->nullable();
            $table->unsignedBigInteger('canceled_by')->nullable();
            $table->dateTime('booked_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
