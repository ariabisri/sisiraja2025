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
        Schema::table('layers', function (Blueprint $table) {
            $table->string('feature')->nullable()->after('deskripsi'); // Menambahkan kolom feature setelah deskripsi
        });
    }

    public function down()
    {
        Schema::table('layers', function (Blueprint $table) {
            $table->dropColumn('feature'); // Menghapus kolom jika rollback
        });
    }
};
