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
        Schema::create('tripsbbbb', function (Blueprint $table) {
            $table->id();
            $table->date('trip_date');
            $table->string('from');
            $table->string('to');
            $table->time('start_time')->nullable();
            $table->time('expected_reach_time')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
