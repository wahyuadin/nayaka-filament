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
        Schema::create('tim_management', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('deskripsi');
            $table->string('image');
            $table->longText('komisaris_direksi');
            $table->longText('senior_manager');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_management');
    }
};
