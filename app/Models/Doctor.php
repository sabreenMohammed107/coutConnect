<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'email',
    'country_id',
    'phone',
    'healthcare_file',
    'licence_file',
    'verified',

];




function user () {
    return $this->hasOne(User::class)->where('type', 0)->latest();
    // return $this->hasOne(User::class)->latest();
 }



public function registerType()
{

    return $this->belongsTo(Register_type::class);
}

public function phones(){
    return $this->hasMany(Doctor_phone::class);
}
public function country()
{

    return $this->belongsTo(Country::class);
}
}
