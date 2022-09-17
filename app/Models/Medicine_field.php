<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine_field extends Model
{
    use HasFactory;
    protected $fillable = [
        'field_enname',
        'field_img',
        'field_overview',
        'order',
    ];


    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_medicine_fields');
    }
}
