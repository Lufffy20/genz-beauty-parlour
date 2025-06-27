<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialist;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialist::create([
            'name' => 'Sophia Martinez',
            'specialization' => 'Specialist in layered cuts and trendy styles.',
            'experience' => 8,
            'image' => 'vendor2.jpg',
            'instagram' => 'https://www.instagram.com/',
            'whatsapp' => 'https://wa.me/',
            'twitter' => 'https://twitter.com/'
        ]);
    }
}
