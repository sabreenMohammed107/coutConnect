<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics_lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'lecture_title',
        'lecture_link',
        'lecture_duration',
        'event_id',
        'topic_id',

    ];
    public function event (){
        return $this->belongsTo(Event::class,'event_id');

    }

}
