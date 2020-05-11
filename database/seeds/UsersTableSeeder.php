<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'adminMan',
            'email' => 'admin.man@edu.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->attachRole('admin_user');
    }
}
