<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\L52\Entities\User::class)->create([
        		'name' => 'eduardo',
		        'email' => 'ecmattos@ig.com.br',
		        'password' => bcrypt(123456),
		        'remember_token' => str_random(10),
        	]);

        #factory(\App\Entities\User::class, 10)->create();
    }
}
