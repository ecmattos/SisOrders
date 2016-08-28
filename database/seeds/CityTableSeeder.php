<?php

use L52\Entities\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
        	[
        		'state_id' => '1',
        		'description' => 'PORTO ALEGRE'
        	],
            [
                'state_id' => '2',
                'description' => 'FLORIANOPOLIS'
            ]
        ];

        foreach ($states as $key => $value) {
        	City::create($value);
        }
    }
}
