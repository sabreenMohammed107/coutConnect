<?php

namespace Database\Seeders;

use App\Models\Organizer_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizerStatusSeeder extends Seeder
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
               'status'=>'Pending',

            ],
            [
               'status'=>'Declined',

            ],
            [
               'status'=>'Active',

            ],
            [
                'status'=>'Suspended',

             ],
             [
                'status'=>'Draft',

             ],

        ];

        foreach ($statuses as $key => $status) {
            Organizer_status::create($status);
        }
    }
}
