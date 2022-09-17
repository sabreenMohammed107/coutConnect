<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'name',
    'event_date_form',
    'event_date_to',
    'event_time_form',
    'event_time_to',
    'organizer_id',
    'city_id',
    'event_fees',
    'featured',
    'premium',
    'event_overview',

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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'events_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'events_tags');
    }


    public function specialzations()
    {
        return $this->belongsToMany(Specialzation::class, 'events_specialzations_fees','event_id','specialize_id');
    }


    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($event) { // before delete() method call this
             $event->medicines()->detach();
             $event->categories()->detach();
             $event->tags()->detach();
             $event->specialzations()->detach();
             // do the rest of the cleanup...
        });
    }
}
