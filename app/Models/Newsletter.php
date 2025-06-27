<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    protected $table = 'newsletters';
    protected $primaryKey = "id"; 

    use HasFactory;

    protected $fillable = ['email'];
}
