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
        // Schema::create('maps', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->integer('latitude');
        //     $table->integer('longitude');
        //     $table->integer('zoom');
        //     $table->text('description')->nullable();
        //     $table->string('map_type');
        //     $table->longText('polygon');
        //     $table->string('marker_color')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};
