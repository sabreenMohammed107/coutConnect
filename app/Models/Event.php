<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'organizer_id',
        'city_id',
        'featured',
        'premium',
        'event_overview',
        'email',
        'ranking',
        'language_id',
        'area',
        'details_address',
        'google_map',
        'event_status_id',
        'event_type_id',
        'cover_photo',

    ];


    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }



    public function medicines()
    {
        return $this->belongsToMany(Medicine_field::class, 'events_medicine_fields');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'events_tags');
    }


    public function specialzations()
    {
        return $this->belongsToMany(Specialzation::class, 'events_specialzations','event_id','specialize_id');
    }


    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($event) { // before delete() method call this
             $event->medicines()->detach();

             $event->tags()->detach();
             $event->specialzations()->detach();
             // do the rest of the cleanup...
        });
    }
}
