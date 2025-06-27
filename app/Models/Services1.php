<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services1 extends Model
{
    use HasFactory;

    protected $primaryKey = "id"; 
    protected $table = 'services1s';

    protected $fillable = ['service_name', 'description'];

    public function packages()
    {

        return $this->hasMany(Package1::class, 'service_id');
        // return $this->hasmany(FacialPackage::class);
        // return $this->hasmany(HaircutPackage::class);

    }

  
    
}
