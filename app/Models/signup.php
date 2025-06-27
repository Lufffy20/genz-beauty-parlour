<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class signup extends Authenticatable
{

    use Notifiable;
    
    use SoftDeletes;
    protected $table = 'signups';
    protected $primaryKey = 'signup_id';

    protected $fillable = [
        'name', 'email', 'password', 'profile_picture'
    ];
}
