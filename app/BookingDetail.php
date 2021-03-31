<?php

namespace App;
use App\Booking;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id','vehicle_id','pickupLoc','dropoffLoc','pickupDate','dropoffDate','extend'
    ];

    

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

}
