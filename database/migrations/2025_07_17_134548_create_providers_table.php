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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra');
            $table->foreignId('kota_id')->constrained('kotas')->onDelete('cascade');
            $table->string('alamat');
            $table->string('telepon')->nullable();
            $table->string('fasilitas');
            $table->string('pemanfaatan_peserta')->nullable();
            $table->boolean('cob')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
