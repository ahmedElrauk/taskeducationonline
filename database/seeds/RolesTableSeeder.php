<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user = \App\Role::create([
            'name' => "admin_user",
            'display_name' => 'admin user',
            'description' => 'can do any thing'
        ]);

        $teacher = \App\Role::create([
            'name' => "teacher",
            'display_name' => 'Teacher',
            'description' => 'can do some thing'
        ]);

        $n_user = \App\Role::create([
            'name' => "n_user",
            'display_name' => 'n_user',
            'description' => 'can do just a thing'
        ]);

    }
}
