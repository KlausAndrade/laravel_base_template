<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            [
                'name' => 'Bathtub',
                'icon' => 'bathtub'
            ],
            [
                'name' => 'Transfer',
                'icon' => 'car-service'
            ],
            [
                'name' => 'Double bed',
                'icon' => 'double-bed'
            ],
            [
                'name' => 'Single bed',
                'icon' => 'single-bed'
            ],
            [
                'name' => 'Two beds',
                'icon' => 'two-bed'
            ],
            [
                'name' => 'Lift',
                'icon' => 'elevator'
            ],
            [
                'name' => 'Hair Dryer',
                'icon' => 'hair-dryer'
            ],
            [
                'name' => 'Living room',
                'icon' => 'living-room'
            ],
            [
                'name' => 'Meal',
                'icon' => 'meal'
            ],
            [
                'name' => 'Swimming pool',
                'icon' => 'swimming-pool'
            ],
            [
                'name' => 'Wifi',
                'icon' => 'wifi'
            ],
        ];

        foreach ($amenities as $amenity) {
            DB::table('amenities')->insert($amenity);
        }
    }
}
