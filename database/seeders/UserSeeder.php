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
            'name' => 'Alvin Maulana',
            'email' => 'maulanaalvin1@gmail.com',
            'password' => bcrypt('pass'),
        ]);
    }
}