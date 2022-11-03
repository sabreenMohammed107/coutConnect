<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialzation extends Model
{
    use HasFactory;
    protected $fillable = [
        'specialize_name',
        'medicine_field_id'

    ];


    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_specialzations_fees','specialize_id','event_id');
    }
    public function field()
    {
        return $this->belongsTo(Medicine_field::class,'medicine_field_id');
    }
}
