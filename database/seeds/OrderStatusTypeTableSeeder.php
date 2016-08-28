<?php

use L52\Entities\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_statuses = [
        	[
        		'code' => 'NAV',
        		'description' => 'NAO AVALIADA'
        	],
            [
                'code' => 'ORC',
                'description' => 'ORCADA'
            ],
            [
                'code' => 'AUT',
                'description' => 'AUTORIZADA'
            ],
            [
                'code' => 'EXE',
                'description' => 'EXECUCAO'
            ],
            [
                'code' => 'ORC',
                'description' => 'ORCADA'
            ],
            [
                'code' => 'PEND',
                'description' => 'PENDENTE'
            ],
            [
                'code' => 'CANC',
                'description' => 'CANCELADA'
            ],
            [
                'code' => 'CONC',
                'description' => 'CONCLUIDA'
            ]
        ];

        foreach ($order_statuses as $key => $value) {
        	OrderStatus::create($value);
        }
    }
}
