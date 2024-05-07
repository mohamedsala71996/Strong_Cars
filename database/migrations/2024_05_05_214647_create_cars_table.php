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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('car_brands');
            $table->foreignId('branch_id')->constrained('branches');
            $table->enum('status', ['available', 'not_available'])->default('available');
            $table->string('model');
            $table->unsignedSmallInteger('year');
            $table->enum('transmission', ['automatic', 'manual']);
            $table->string('color_ar');
            $table->string('color_en');
            $table->unsignedInteger('seats_number');
            $table->boolean('air_conditioning')->default(false);
            $table->string('photo')->nullable();
            $table->boolean('air_bags')->default(false);
            $table->enum('fuel_type_ar', ['بنزين', 'ديزل', 'كهرباء'])->default('بنزين');
            $table->enum('fuel_type_en', ['gasoline', 'diesel', 'electric'])->default('gasoline');
            $table->unsignedDecimal('real_price', 10, 2);
            $table->unsignedDecimal('offer_price', 10, 2)->nullable();
            $table->string('car_size')->nullable();
            $table->unsignedTinyInteger('rate')->nullable();
            $table->unsignedDecimal('fuel_consumption', 10, 2)->nullable();
            $table->unsignedTinyInteger('tire_size')->nullable();
            $table->unsignedSmallInteger('horsepower_number')->nullable();
            $table->unsignedTinyInteger('cylinder_number')->nullable();
            $table->unsignedDecimal('engine_capacity', 5, 2)->nullable(); // in liters
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
