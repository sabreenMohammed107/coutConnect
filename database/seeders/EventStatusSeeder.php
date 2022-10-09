<?php

namespace Database\Seeders;

use App\Models\Event_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventStatusSeeder extends Seeder
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
               'status'=>'Published',

            ],
            [
               'status'=>'Suspended',

            ],
            [
                'status'=>'Draft',

             ],
             [
                'status'=>'Closed',

             ],
             [
                'status'=>'Declined',

             ],

        ];

        foreach ($statuses as $key => $status) {
            Event_status::create($status);
        }
    }
}
