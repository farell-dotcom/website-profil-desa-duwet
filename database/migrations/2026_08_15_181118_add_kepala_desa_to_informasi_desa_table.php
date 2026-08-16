<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi_desa', function (Blueprint $table) {
            $table->string('nama_kepala_desa')->nullable()->after('jumlah_penduduk');
            $table->string('foto_kepala_desa')->nullable()->after('nama_kepala_desa');
            $table->text('sambutan')->nullable()->after('foto_kepala_desa');
        });
    }

    public function down(): void
    {
        Schema::table('informasi_desa', function (Blueprint $table) {
            $table->dropColumn(['nama_kepala_desa', 'foto_kepala_desa', 'sambutan']);
        });
    }
};