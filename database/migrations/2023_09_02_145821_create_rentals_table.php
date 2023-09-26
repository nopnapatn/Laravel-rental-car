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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('renter_id')->constrained('users');
            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('driver_id')->constrained('drivers');

            $table->string('start_at_province');
            $table->string('end_at_province');
            $table->string('start_at_date');
            $table->string('end_at_date');
            $table->string('start_at_time');
            $table->string('end_at_time');
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            // $table->string('baggage_description');
            // $table->string('seat');
            // $table->integer('price');
            // $table->integer('total_price');

            $table->string('car_title');
            $table->string('car_image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
