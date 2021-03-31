<?php

namespace App;
use App\Vehicle;

use Illuminate\Database\Eloquent\Model;

class VehicleRate extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id', 'rate'
    ];


    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

}
