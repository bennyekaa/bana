<?php

if (!function_exists('bulanRomawi')) {
    function bulanRomawi($bulan)
    {
        $romawi = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];

        return $romawi[(int)$bulan] ?? null;
    }
}

if (!function_exists('generateNomorLp')) {
    function generateNomorLp($no, $kode, $bulan, $tahun)
    {
        $noUrut = str_pad($no, 2, '0', STR_PAD_LEFT);
        $bulanRomawi = bulanRomawi($bulan);

        return "LP- {$noUrut} / {$kode} / {$bulanRomawi} / {$tahun}";
    }
}
