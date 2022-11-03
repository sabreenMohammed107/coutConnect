<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_instractor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'event_id',
        'bio',
        'active',

    ];
}
