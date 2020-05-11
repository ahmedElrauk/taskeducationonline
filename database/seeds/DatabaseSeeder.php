<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\RolesTableSeeder;
//use UserTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(LaratrustSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
