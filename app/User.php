<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserDocument;
use App\Role;
use App\Booking;
use App\Testimonial;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','imgLoc','status','dob','address','mobile','licenseNo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function UserDocument()
    {
        return $this->hasOne(UserDocument::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function Testimonial()
    {
        return $this->hasMany(Testimonial::class);
    }
}
