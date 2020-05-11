<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = \App\User::create([
            'name' => 'ahmed',
            'email' => 'ahmed.admin@edu.com',
            'password' => bcrypt('ahmed111')
        ]);

        $user2 = \App\User::create([
            'name' => 'the teacher',
            'email' => 'the.teacher@edu.com',
            'password' => bcrypt('teacher1')
        ]);

        $user3 = \App\User::create([
            'name' => 'normal',
            'email' => 'normal@edu.com',
            'password' => bcrypt('normal11')
        ]);

        $user1->attachRole('admin_user');
        $user2->attachRole('teacher');
        $user3->attachRole('n_user');

    }
}
