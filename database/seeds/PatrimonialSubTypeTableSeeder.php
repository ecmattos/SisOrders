<?php

use L52\Entities\PatrimonialSubType;
use Illuminate\Database\Seeder;

class PatrimonialSubTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_sub_types = [
        	[
        		'code' => 'MET',
        		'description' => 'MOTOR ELETRICO TRIF'
        	],
            [
                'code' => 'MEM',
                'description' => 'MOTOR ELETRICO MONOF'
            ],
            [
                'code' => 'MBS',
                'description' => 'MOTOBOMBA SUBMERSIVEL'
            ]
        ];

        foreach ($patrimonial_sub_types as $key => $value) {
        	PatrimonialSubType::create($value);
        }
    }
}
