<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MailAddress extends Model
{
    use HasFactory;

    const MAIL_TYPE_SEND = 'send';

    const MAIL_TYPE_CC = 'cc';

    const TYPE_CAR_REQUEST = 'car.request';

    const TYPE_TECHNICAL_REQUEST = 'technical.request';

    const TYPE_FOOD_REQUEST = 'food.request';

    const TYPE_MEETING_REQUEST = 'meeting.request';

    const TYPE_CLEANING_REQUEST = 'cleaning.request';

    const TYPE_CENTRAL_TECHNICAL_REQUEST = 'central.technical.request';

    const TYPE_INTERNET_TECHNOLOGY_REQUEST = 'internet.technology.request';

    protected $guarded = ['id'];

    public static array $mailTypes = [
        self::MAIL_TYPE_SEND => 'Gönderilecek Mail',
        self::MAIL_TYPE_CC => 'CC Maili',
    ];

    public static array $titles = [
        self::TYPE_CAR_REQUEST => 'ARAÇ TALEP FORMU',
        self::TYPE_TECHNICAL_REQUEST => 'TEKNİK SERVİS TALEP FORMU',
        self::TYPE_FOOD_REQUEST => 'YEMEK/İKRAM TALEP FORMU',
        self::TYPE_MEETING_REQUEST => 'TOPLANTI-SALON TALEP FORMU',
        self::TYPE_CLEANING_REQUEST => 'TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU',
        self::TYPE_CENTRAL_TECHNICAL_REQUEST => 'DOWNTOWN TEKNİK SERVİS TALEP FORMU',
        self::TYPE_INTERNET_TECHNOLOGY_REQUEST => 'BİLGİ İŞLEM TALEP FORMU'
    ];

    public function getFormType(): string
    {
        return self::$titles[$this->form_type] ?? 'Bilinmeyen';
    }

    public function getMailType()
    {
        return self::$mailTypes[$this->mail_type] ?? 'Bilinmeyen';
    }

    public static function getFormTypes(): Collection
    {
        return collect(self::$titles);
    }

    public static function getMailTypes(): Collection
    {
        return collect(self::$mailTypes);
    }

    public static function getType($type): string
    {
        if (! isset(self::$titles[$type])) {
            return 'Bilinmeyen';
        }

        return self::$titles[$type];
    }
}
