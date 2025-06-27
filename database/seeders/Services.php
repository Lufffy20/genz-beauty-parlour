<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Services1;

class Services extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            Services1::create(['service_name' => 'Haircuts & Styling',
             'description' => 'Professional maid services for your home.','images'=>'maid.jpg' ]);
             Services1::create(['service_name' => 'Facials & Skincare',
              'description' => 'Professional Physio services for your home.','images'=>'maid.jpg' ]);
              Services1::create(['service_name' => 'Makeup Services',
               'description' => 'Professional Maternity care  services for your home.','images'=>'maid.jpg' ]);
               Services1::create(['service_name' => 'Waxing & Hair Removal',
               'description' => 'Professional Psychiatrist services for your home.','images'=>'maid.jpg', ]);
               Services1::create(['service_name' => 'Manicure & Pedicure',
               'description' => 'Professional Old Age services for your home.','images'=>'maid.jpg' ]);
               Services1::create(['service_name' => 'Eyebrow & Lash',
               'description' => 'Professional Old Age services for your home.','images'=>'maid.jpg' ]);
               Services1::create(['service_name' => 'Henna & Mehndi',
               'description' => 'Professional Old Age services for your home.','images'=>'maid.jpg' ]);
               Services1::create(['service_name' => 'Bridal Services',
               'description' => 'Professional Old Age services for your home.','images'=>'maid.jpg' ]);   
         }
    }
}
