<?php

use L52\Entities\State;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
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
        		'code' => 'RS',
        		'description' => 'RIO GRANDE DO SUL'
        	],
            [
                'code' => 'SC',
                'description' => 'SANTA CATARINA'
            ]
        ];

        foreach ($states as $key => $value) {
        	State::create($value);
        }
    }
}
