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
}
