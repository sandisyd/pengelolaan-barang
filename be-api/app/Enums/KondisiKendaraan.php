<?php

namespace App\Enums;

enum KondisiKendaraan: string
{
    case BAIK = 'baik';
    case RUSAK_RINGAN = 'rusak ringan';
    case RUSAK_BERAT = 'rusak berat';

    public static function options(): array
    {
        return [
            self::BAIK->value,
            self::RUSAK_RINGAN->value,
            self::RUSAK_BERAT->value,
        ];
    }
}