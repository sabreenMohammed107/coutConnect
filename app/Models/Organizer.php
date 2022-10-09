<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'status_id',
        'name',
        'img',
        'overview',
        'email',
        'website',
        'fb_account',
        'linkedin_account',
        'twitter_account',
        'youtube_account',
        'licence_file',
        'bussiness_field',
    ];


    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function status()
    {
        return $this->belongsTo(Organizer_status::class);
    }


    public function organizers(){
        return $this->hasMany(Organizer_phone::class,'organizer_id','id');
    }
}
