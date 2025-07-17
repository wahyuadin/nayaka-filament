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
        Schema::create('inhouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kota_id')->constrained('kotas')->onDelete('cascade');
            $table->string('kode_faskes')->nullable();
            $table->string('nama_mitra');
            $table->longText('alamat');
            $table->string('telepon')->nullable();
            $table->string('fasilitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inhouses');
    }
};
