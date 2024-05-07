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
        Schema::create('rental_steps', function (Blueprint $table) {
            $table->id();
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('first_step_ar');
            $table->text('first_step_en');
            $table->text('second_step_ar');
            $table->text('second_step_en');
            $table->text('third_step_ar');
            $table->text('third_step_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_steps');
    }
};
