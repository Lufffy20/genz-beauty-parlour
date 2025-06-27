<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package1 extends Model
{

    use HasFactory;

    protected $table = 'package1s';
    protected $primaryKey = "id"; 

    protected $fillable = ['package_name', 'description','images', 'price','service_id','category'];

    public function service()
    {
        return $this->belongsTo(Services1::class);
    }

    public function package()
{
    return $this->belongsTo(Package::class, 'package_id');
}

public function bookings()
{
    return $this->hasMany(AllBooking::class, 'package_id');
}

}
