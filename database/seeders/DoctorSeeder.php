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




            ],
            [
                'name'=>'Admin User2',



            ],
            [
                'name'=>'Admin User3',



            ],
        ];

        foreach ($doctors as $key => $doctor) {
            Doctor::create($doctor);
        }
    }
}
