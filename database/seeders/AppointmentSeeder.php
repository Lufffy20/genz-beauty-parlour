<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Faker\Factory as Faker;

class AppointmentSeeder extends Seeder
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

        $Appointment =new Appointment();
        $Appointment->name=$faker->name;
        $Appointment->email=$faker->email;
        $Appointment->phonenumber=$faker->phonenumber;
        $Appointment->gender = "F";
        $Appointment->select='Facial Service';
        $Appointment->subservice='Gold facial';
        $Appointment->time=$faker->time;
        $Appointment->date=$faker->date;
        $Appointment->message=$faker->text;
        $Appointment->save();
        }        
    }
}

