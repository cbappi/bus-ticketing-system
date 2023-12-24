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
        Schema::create('seat_allocationshh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('location_id');
            $table->string('user_name');
            $table->string('phone')->unique();
            $table->string('ticket_number')->unique();
            $table->integer('ticket_price');
            $table->time('bus_start_time')->nullable();
            $table->foreign('trip_id')->references('id')->on('trips')->cascadeOnUpdate();
            $table->foreign('location_id')->references('id')->on('locations')
            ->cascadeOnUpdate();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_allocations');
    }
};
