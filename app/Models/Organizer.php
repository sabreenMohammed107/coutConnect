<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    'img',
    'overview',
    'phone',
    'email',
    'website',
    'fb_account',
    'linkedin_account',
    'twitter_account',
    'youtube_account',
    ];


    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
