<?php

use L52\Entities\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_users = [
        	[
        		'user_id' => 1,
        		'role_id' => 1
        	]
        ];

        foreach ($role_users as $key => $value) {
        	RoleUser::create($value);
        }
    }
}
