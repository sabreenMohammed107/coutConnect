<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_days extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_date_from',
    'event_date_to',
    'event_id',

    ];


}
