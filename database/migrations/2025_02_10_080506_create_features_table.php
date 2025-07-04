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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layer_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('latlng'); // Format: "latitude,longitude"
            $table->string('icon')->nullable(); // Path atau URL gambar icon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
