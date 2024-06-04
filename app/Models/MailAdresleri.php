<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailAdresleri extends Model
{
    use HasFactory;

    const TYPE_CAR_REQUEST = 1;

    const TYPE_TECHNICAL_REQUEST = 2;

    const TYPE_FOOD_REQUEST = 3;

    const TYPE_MEETING_REQUEST = 4;

    const TYPE_CLEANING_REQUEST = 5;

    const TYPE_CENTRAL_TECHNICAL_REQUEST = 6;

    const TYPE_INTERNET_TECHNOLOGY_REQUEST = 7;

    public static array $titles = [
        self::TYPE_CAR_REQUEST => 'ARAÇ TALEP FORMU',
        self::TYPE_TECHNICAL_REQUEST => 'TEKNİK SERVİS TALEP FORMU',
        self::TYPE_FOOD_REQUEST => 'YEMEK/İKRAM TALEP FORMU',
        self::TYPE_MEETING_REQUEST => 'TOPLANTI-SALON TALEP FORMU',
        self::TYPE_CLEANING_REQUEST => 'TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU',
        self::TYPE_CENTRAL_TECHNICAL_REQUEST => 'DOWNTOWN TEKNİK SERVİS TALEP FORMU',
        self::TYPE_INTERNET_TECHNOLOGY_REQUEST => 'BİLGİ İŞLEM TALEP FORMU'
    ];

    public static function getType($type): string
    {
        if (! isset(self::$titles[$type])) {
            return 'Bilinmeyen';
        }

        return self::$titles[$type];
    }
}
