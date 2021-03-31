<?php

namespace App;
use App\Booking;

use Illuminate\Database\Eloquent\Model;

class BookingAdditionalEquip extends Model
{
    protected $fillable = [
        'booking_id','additionalEquip_id'
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    
}
