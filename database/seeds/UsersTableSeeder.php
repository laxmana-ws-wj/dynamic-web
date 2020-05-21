<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = User::create([
            'fname' => 'User',
            'lname' => 'User',
            'gender' => 1,
            'dob' => '2020-02-14',
            'age' => 23,
            'height' => 6,
            'weight' => 56,
            'username' => 'useruser',
            'profile_pic' => '/profile_pic/user.jpeg',
            'contact_no' => 9,
            'address' => 'User',
            'role' => 'user',
            'email' => 'user@gym.com',
            'password' => bcrypt('password')
        ]);

    }
}
