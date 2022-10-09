<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer_phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'organizer_id',
        'phone',
    ];
}
