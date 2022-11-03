<?php

namespace Database\Seeders;

use App\Models\Register_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegisterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
               'status'=>'website',

            ],
            [
               'status'=>'facebook',

            ],
            [
               'status'=>'linkedin',

            ],
            [
                'status'=>'gmail',

             ],


        ];

        foreach ($statuses as $key => $status) {
            Register_type::create($status);
        }
    }
}
