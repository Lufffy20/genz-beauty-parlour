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
        Schema::table('all_bookings', function (Blueprint $table) {
            $table->string('status')->default('Pending'); // Add the status column with default value
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_bookings', function (Blueprint $table) {
            $table->dropColumn('status'); // Rollback the status column if needed
        });
    }
};
