<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{

    protected $table = "specialists";
    protected $primaryKey = "id";

    use HasFactory;
    protected $fillable = ['name', 'service_id','specialization', 'experience', 'image', 'instagram', 'whatsapp', 'twitter', 'status'];

    // In Specialist.php model
public function service()
{
    return $this->belongsTo(Services1::class, 'service_id');
}

}
