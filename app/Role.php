<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','roleName'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
