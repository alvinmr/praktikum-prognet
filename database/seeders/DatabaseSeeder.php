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
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductCategoryDetailSeeder::class,
            ProductImageSeeder::class,
            LocationSeeder::class,
            CourierSeeder::class,
            UserSeeder::class
        ]);
    }
}