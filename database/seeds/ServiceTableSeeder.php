<?php

use L52\Entities\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
        	[
        		'code' => '23423',
        		'description' => 'REBOBINAGEM 21 A 50CV',
                'unit' => 'SV',
                'cost_value' => '1000',
                'sale_value' => '1800'
        	],
            [
                'code' => '2323423',
                'description' => 'REBOBINAGEM 10 A 20CV',
                'unit' => 'SV',
                'cost_value' => '500',
                'sale_value' => '950'
            ]
        ];

        foreach ($services as $key => $value) {
        	Service::create($value);
        }
    }
}
