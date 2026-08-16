<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi_desa', function (Blueprint $table) {
            $table->string('jumlah_laki_laki')->nullable()->after('jumlah_penduduk');
            $table->string('jumlah_perempuan')->nullable()->after('jumlah_laki_laki');
            $table->string('jumlah_kk')->nullable()->after('jumlah_perempuan');
        });
    }

    public function down(): void
    {
        Schema::table('informasi_desa', function (Blueprint $table) {
            $table->dropColumn(['jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_kk']);
        });
    }
};