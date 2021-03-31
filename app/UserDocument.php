<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    protected $table = 'user_documents';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'drivingLicense', 'identityProof', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
