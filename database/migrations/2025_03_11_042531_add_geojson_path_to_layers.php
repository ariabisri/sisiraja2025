<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('layers', function (Blueprint $table) {
            $table->string('geojson_path')->nullable()->after('json'); // Tambah kolom
        });
    }

    public function down()
    {
        Schema::table('layers', function (Blueprint $table) {
            $table->dropColumn('geojson_path'); // Hapus kolom jika rollback
        });
    }
};
