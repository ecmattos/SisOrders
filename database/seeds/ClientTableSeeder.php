<?php

use L52\Entities\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
        	[
        		'client_type_id' => '1',
                'city_id' => '1',
                'code' => '05533866000181',
        		'description' => 'PORTOBOMBAS COMERCIO LTDA',
                'description_short' => 'PORTOBOMBAS'
        	]
        ];

        foreach ($clients as $key => $value) {
        	Client::create($value);
        }
    }
}
