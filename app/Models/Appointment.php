<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'gender',
        'select',       
        'subservice',    
        'time',
        'date',
        'message',
        'payment_id',       
        'price'
    ];
}
