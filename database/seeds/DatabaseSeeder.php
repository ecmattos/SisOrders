<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ClientTypeTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(MaterialUnitTableSeeder::class);
        $this->call(PatrimonialBrandTableSeeder::class);
        $this->call(PatrimonialTypeTableSeeder::class);
        $this->call(PatrimonialSubTypeTableSeeder::class);
        $this->call(PatrimonialModelTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(ContractTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        #$this->call(OrderTableSeeder::class);
    }
}
