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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->enum('created_by_type', ['admin', 'customer', 'provider']);
            $table->foreignId('booking_id')->constrained('bookings');
            $table->foreignId('assigned_to')->nullable()->constrained('admins')->nullOnDelete(); 
            $table->text('message');
            $table->enum('status', ['open', 'in_progress', 'closed']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
