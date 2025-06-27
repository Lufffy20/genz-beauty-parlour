<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HaircutPackage extends Model
{
    use HasFactory;


    
    protected $table = 'haircut_packages';
    protected $primaryKey = "id"; 

    protected $fillable = ['service_name', 'description','images','service_id'];

    public function service()
    {
        return $this->belongsTo(Services1::class);
    }

    public function packages()
    {
        return $this->hasmany(ServicesPackage::class,'service_id');
    }
}
