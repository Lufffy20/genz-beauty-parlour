<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Package1;

class AllBooking extends Model
{
    use HasFactory;
    protected $table = 'all_bookings';
    protected $primaryKey = 'id';

    public function package()
    {
        return $this->belongsTo(Package1::class, 'package_id');
    }


    protected $fillable = [
      'package_id',  'name', 'email', 'phonenumber', 'gender', 'time', 'date', 'message','specialist','payment_id','status',
    ];



    public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist');
    }

    public function cartItems()
{
    return $this->hasMany(CartItem::class, 'booking_id');
}

public function booking()
{
    return $this->belongsTo(AllBooking::class, 'booking_id');
}

}
