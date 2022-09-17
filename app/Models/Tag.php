<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag',

    ];


    public function events()
    {
        return $this->belongsToMany(Tag::class, 'events_tags');
    }

}
