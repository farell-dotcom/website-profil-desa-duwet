<?php

namespace App\Providers;

use App\Models\KontakDesa;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $kontakFooter = Cache::remember('kontak_footer', 300, function () {
                return KontakDesa::first();
            });

            $statKunjungan = Cache::remember('stat_kunjungan_' . now()->format('Y-m-d'), 60, function () {
                return [
                    'hari_ini' => Kunjungan::hariIni(),
                    'kemarin' => Kunjungan::kemarin(),
                    'minggu_ini' => Kunjungan::mingguIni(),
                    'minggu_lalu' => Kunjungan::mingguLalu(),
                    'bulan_ini' => Kunjungan::bulanIni(),
                    'bulan_lalu' => Kunjungan::bulanLalu(),
                    'total' => Kunjungan::totalKunjungan(),
                ];
            });

            $view->with('kontakFooter', $kontakFooter);
            $view->with('statKunjungan', $statKunjungan);
        });
    }
}