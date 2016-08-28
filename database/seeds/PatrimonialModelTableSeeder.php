<?php

use L52\Entities\PatrimonialModel;
use Illuminate\Database\Seeder;

class PatrimonialModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_models = [
        	[
        		'code' => 'MOD 1',
        		'description' => 'MODELO I'
        	],
            [
                'code' => 'MOD 2',
                'description' => 'MODELO II'
            ],
            [
                'code' => 'MOD 3',
                'description' => 'MODELO III'
            ]
        ];

        foreach ($patrimonial_models as $key => $value) {
        	PatrimonialModel::create($value);
        }
    }
}
