<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class login extends Model
{
    protected $table = 'logins';
    protected $primaryKey = 'login_id';

    protected $fillable = ['email', 'password'];

    public function getAuthPassword()
    {
        return $this->password; // Make sure the column exists in the database
    }
}
