<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
    'order_status_id',
    'doctor_id',
    'event_id',
    'payment_method_id',
    'name',
    'email',
    'country_id',
    'phone',
    'ticket_id',
    'booked_quantity',
    'copoun_id',
    'discount_id',
    'ticket_net_fees',
    'notes',
    ];

    public function status()
    {
        return $this->belongsTo(Order_status::class ,'order_status_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
    public function organizer()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

}
