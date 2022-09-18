<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events_specialzations_fees extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'specialize_id',
        'fees',
    ];

}
