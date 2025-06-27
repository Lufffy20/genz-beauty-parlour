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
            $table->string('hairstyle_specialist')->nullable()->after('message'); // After message column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_bookings', function (Blueprint $table) {
            $table->dropColumn('hairstyle_specialist');
        });
    }
};
