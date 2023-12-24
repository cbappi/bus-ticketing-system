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
        Schema::create('seat_allocations', function (Blueprint $table) {

            $table->id();
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade')->onUpdate('cascade');
            $table->date('trip_date');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('destination');
            $table->integer('ticket_quantity');
            $table->integer('price');
            $table->integer('amount');
            $table->time('bus_start_time')->nullable();
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
