<?php

use L52\Entities\PatrimonialBrand;
use Illuminate\Database\Seeder;

class PatrimonialBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patrimonial_brands = [
        	[
        		'code' => 'FLY',
        		'description' => 'FLYGT'
        	],
            [
                'code' => 'LOW',
                'description' => 'LOWARA'
            ],
            [
                'code' => 'XYL',
                'description' => 'XYLEM'
            ]
        ];

        foreach ($patrimonial_brands as $key => $value) {
        	PatrimonialBrand::create($value);
        }
    }
}
