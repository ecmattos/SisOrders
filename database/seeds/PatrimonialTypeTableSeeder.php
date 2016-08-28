<?php

use L52\Entities\PatrimonialType;
use Illuminate\Database\Seeder;

class PatrimonialTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_types = [
        	[
        		'code' => 'MEC',
        		'description' => 'MECANICO'
        	],
            [
                'code' => 'ELE',
                'description' => 'ELETRICO'
            ],
            [
                'code' => 'ELMEC',
                'description' => 'ELETROMECANICO'
            ]
        ];

        foreach ($patrimonial_types as $key => $value) {
        	PatrimonialType::create($value);
        }
    }
}
