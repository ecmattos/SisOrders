<?php

use L52\Entities\ClientType;
use Illuminate\Database\Seeder;

class ClientTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client_types = [
        	[
        		'code' => 'PJ',
        		'description' => 'PESSOA JURIDICA'
        	],
            [
                'code' => 'PF',
                'description' => 'PESSOA FISICA'
            ]
        ];

        foreach ($client_types as $key => $value) {
        	ClientType::create($value);
        }
    }
}
