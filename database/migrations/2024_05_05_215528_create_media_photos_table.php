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
        Schema::create('media_photos', function (Blueprint $table) {
            $table->id();
            $table->string('mainSection_header_en');
            $table->string('mainSection_header_ar');
            $table->string('mainSection_middle')->nullable();
            $table->string('advantages_en');
            $table->string('advantages_ar');
            $table->string('carSection_header')->nullable();
            $table->string('businessSector_communicate')->nullable();
            $table->string('offerSection_header')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_photos');
    }
};
