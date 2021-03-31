<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VehicleRate;
class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageUrl', 'model', 'brand','color','desc','plateNo','addedDate','status','ageLimit'
    ];


    
    public function VehicleRate()
    {
        return $this->hasOne(VehicleRate::class);
    }

}
