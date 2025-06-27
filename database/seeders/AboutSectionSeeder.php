<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    public function run()
    {
        AboutSection::create([
            'title' => 'About Our Center',
            'description' => 'Experience the ultimate relaxation and beauty transformation at our center. Our expert team ensures a soothing environment and premium services to cater to your beauty needs.',
            'image' => 'images/about_img.jpg'
        ]);
    }
}