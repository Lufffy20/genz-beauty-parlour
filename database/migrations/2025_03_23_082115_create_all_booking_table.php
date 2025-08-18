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
        Schema::create('all_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('package1s'); // Foreign key for package
            $table->string('name');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('gender');
            $table->string('time');
            $table->date('date');
            $table->text('message')->nullable();
            $table->foreignId('specialist')->constrained('specialists'); // Foreign key for specialist
            $table->string('payment_id')->nullable();
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_booking');
    }
};
