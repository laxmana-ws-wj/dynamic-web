<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gym.com',
            'password' => bcrypt('password')
        ]);
    }
}
