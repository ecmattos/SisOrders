<?php

use L52\Entities\MaterialUnit;
use Illuminate\Database\Seeder;

class MaterialUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material_units = [
        	[
        		'code' => 'M',
        		'description' => 'METRO LINEAR'
        	],
            [
                'code' => 'M2',
                'description' => 'METRO QUADRADO'
            ],
            [
                'code' => 'M3',
                'description' => 'METRO CUBICO'
            ],
            [
                'code' => 'PC',
                'description' => 'PECA'
            ],
            [
                'code' => 'KG',
                'description' => 'QUILOGRAMA'
            ],
            [
                'code' => 'G',
                'description' => 'GRAMA'
            ],
            [
                'code' => 'L',
                'description' => 'LITRO'
            ]
        ];

        foreach ($material_units as $key => $value) {
        	MaterialUnit::create($value);
        }
    }
}
