<?php

use L52\Entities\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'name' => 'admin',
        		'display_name' => 'Administradores',
        		'description' => 'Administradores'
        	]
        ];

        foreach ($roles as $key => $value) {
        	Role::create($value);
        }
    }
}
