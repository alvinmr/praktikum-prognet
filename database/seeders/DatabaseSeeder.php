<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ProductSeeder::class,
            ProductCategorySeeder::class,
            ProductImageSeeder::class,
            LocationSeeder::class,
            CourierSeeder::class,
            UserSeeder::class
        ]);
    }
}