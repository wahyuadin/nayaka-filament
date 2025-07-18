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
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('departement_id')->constrained('departement_carriers')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('location_carriers')->onDelete('cascade');
            $table->foreignId('pengalaman_id')->constrained('pengalaman_carriers')->onDelete('cascade');
            $table->longtext('description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carriers');
    }
};
