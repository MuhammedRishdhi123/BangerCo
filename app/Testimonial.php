<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','description', 'rating'
    ];


    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
