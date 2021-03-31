<?php

namespace App;
use App\BookingDetail;
use App\BookingAdditionalEquip;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id','status','bookingDate'
    ];


    public function bookingDetail()
    {
        return $this->hasOne(BookingDetail::class);
    }

    public function bookingAdditionalEquip()
    {
        return $this->hasMany(BookingAdditionalEquip::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
