<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_coupon_discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'partner_pct_amount',
        'partner_amount_value',
        'coat_pct_amount',
        'coat_amount_value',
        'coupons_discount_flag',
        'valid_from',
        'valid_to',
        'coupons_quantity',
        'event_id',

    ];
}
