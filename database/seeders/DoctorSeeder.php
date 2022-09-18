<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            [
                'name'=>'Admin User1',


                'phone'=>'012004751456',

            ],
            [
                'name'=>'Admin User2',


                'phone'=>'012004751456',
            ],
            [
                'name'=>'Admin User3',


                'phone'=>'012004751456',
            ],
        ];

        foreach ($doctors as $key => $doctor) {
            Doctor::create($doctor);
        }
    }
}
