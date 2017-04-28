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

        if (\App\Role::all()->first() == null) {
            $this->call(RoleSeed::class);
        }
        if (\App\User::all()->first() == null) {
            $this->call(UserSeed::class);
        }
        if (\App\TireBrand::all()->first() == null) {
            $this->call(TireBrandSeed::class);
        }
        if (\App\TireSize::all()->first() == null) {
            $this->call(TireSizeSeed::class);
        }

    }
}
