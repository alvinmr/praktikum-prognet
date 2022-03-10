<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'user',
            'password' => bcrypt('user'),
            'name' => 'User',
            'email' => 'test@gmail.com',
            'phone' => '08999999999',
        ]);
    }
}