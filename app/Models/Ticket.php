<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'currency_id',
        'quantity',
        'status_id',
        'event_id',
        'start_date',
        'end_date',

    ];

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}
