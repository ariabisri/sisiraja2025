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
        Schema::create('layer_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('map_id')->constrained('maps')->onDelete('cascade'); // Relasi ke tabel maps
            $table->foreignId('layer_id')->constrained('layers')->onDelete('cascade'); // Relasi ke tabel layers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layer_map');
    }
};
