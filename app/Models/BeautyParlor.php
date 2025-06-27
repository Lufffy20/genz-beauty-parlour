<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeautyParlor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'latitude', 'longitude'];
}
