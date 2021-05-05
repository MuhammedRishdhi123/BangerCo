<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScrapeVehicle extends Model{
    protected $fillable = [
        'title','monthrate', 'weekrate'
    ];
}