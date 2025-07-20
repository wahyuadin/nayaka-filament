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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('email');
            $table->string('telp');
            $table->longText('google_maps');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_pusat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
