<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';

    protected $fillable = [
        'tanggal',
        'jumlah',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public static function catatKunjunganHariIni(): void
    {
        $hariIni = now()->format('Y-m-d');

        $kunjungan = self::firstOrCreate(
            ['tanggal' => $hariIni],
            ['jumlah' => 0]
        );

        $kunjungan->increment('jumlah');
    }

    public static function totalKunjungan(): int
    {
        return (int) self::sum('jumlah');
    }

    public static function hariIni(): int
    {
        $data = self::where('tanggal', now()->format('Y-m-d'))->first();

        return $data ? $data->jumlah : 0;
    }

    public static function kemarin(): int
    {
        $data = self::where('tanggal', now()->subDay()->format('Y-m-d'))->first();

        return $data ? $data->jumlah : 0;
    }

    public static function mingguIni(): int
    {
        return (int) self::whereBetween('tanggal', [
            now()->startOfWeek()->format('Y-m-d'),
            now()->endOfWeek()->format('Y-m-d'),
        ])->sum('jumlah');
    }

    public static function mingguLalu(): int
    {
        return (int) self::whereBetween('tanggal', [
            now()->subWeek()->startOfWeek()->format('Y-m-d'),
            now()->subWeek()->endOfWeek()->format('Y-m-d'),
        ])->sum('jumlah');
    }

    public static function bulanIni(): int
    {
        return (int) self::whereBetween('tanggal', [
            now()->startOfMonth()->format('Y-m-d'),
            now()->endOfMonth()->format('Y-m-d'),
        ])->sum('jumlah');
    }

    public static function bulanLalu(): int
    {
        return (int) self::whereBetween('tanggal', [
            now()->subMonth()->startOfMonth()->format('Y-m-d'),
            now()->subMonth()->endOfMonth()->format('Y-m-d'),
        ])->sum('jumlah');
    }
}