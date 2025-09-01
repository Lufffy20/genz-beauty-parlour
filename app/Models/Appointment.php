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
        'select',       // This stores service_id
        'subservice',   // This stores package_id
        'time',
        'date',
        'message',
        'payment_id',       
        'price'
    ];

    /**
     * Get the service related to the appointment.
     */
    public function serviceRelation()
    {
        return $this->belongsTo(Services1::class, 'select', 'id'); 
        // 'select' = column in appointments table
        // 'id' = primary key in services1s table
    }

    /**
     * Get the subservice (package) related to the appointment.
     */
    public function subserviceRelation()
    {
        return $this->belongsTo(Package1::class, 'subservice', 'id'); 
        // 'subservice' = column in appointments table
        // 'id' = primary key in package1s table
    }
}
