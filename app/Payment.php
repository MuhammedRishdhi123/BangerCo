<?php

namespace App;
use App\Payment;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id', 'amount', 'status','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
    
}
