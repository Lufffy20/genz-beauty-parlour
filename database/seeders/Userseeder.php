<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\signup;
use Faker\Factory as Faker;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //if you want add satatic data 
        // $signup =new signup();
        // $signup->name='meet';
        // $signup->email='meet@gmail.com';
        // $signup->password='123';
        // $signup->save();
        

        $faker = Faker::create();
        for($i=1;$i<=10;$i++){

        $signup =new signup();
        $signup->name=$faker->name;
        $signup->email=$faker->email;
        $signup->password=$faker->password;
        $signup->save();
        }        
    }
}
