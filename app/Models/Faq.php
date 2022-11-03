<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
    'answer',
    'question_date',
    'answer_date',
    'event_id',
    'doctor_id',
    'notes',
    'active',

    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
