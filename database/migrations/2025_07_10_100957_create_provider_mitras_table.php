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
        Schema::create('provider_mitras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kota_id')->constrained('kotas')->cascadeOnDelete();
            $table->string('nama_mitra');
            $table->text('alamat');
            $table->string('telp');
            $table->string('fasilitas');
            $table->string('pemanfaatan_peserta');
            $table->string('cob');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_mitras');
    }
};
