<?php

use L52\Entities\Contract;
use Illuminate\Database\Seeder;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contracts = [
        	[
        		'code' => '(SEM CONTRATO)',
                'description' => '(SEM CONTRATO)',
                'client_id' => '1',
                'manager_id' => '1'
        	]
        ];

        foreach ($contracts as $key => $value) {
        	Contract::create($value);
        }
    }
}
