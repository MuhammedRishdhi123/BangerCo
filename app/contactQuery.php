<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactQuery extends Model
{
    protected $fillable = [
        'fullname','email','message'
    ];
}
