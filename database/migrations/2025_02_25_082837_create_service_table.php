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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('gender');
            $table->string('select');
            $table->string('subservice');
            $table->string('time');
            $table->string('date');
            $table->string('message');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('package_id')->on('package');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
