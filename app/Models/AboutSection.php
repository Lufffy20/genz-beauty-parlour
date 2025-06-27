<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;
    protected $table = 'about_sections';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'image'];
}