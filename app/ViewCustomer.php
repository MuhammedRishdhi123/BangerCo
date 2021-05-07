<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewCustomer extends Model
{
    public $table = "view_customer";

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name','licenseNo','status'
    ];


}
