<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::insert([
            [
                'category_name' => 'Air Cooling',
            ],
            [
                'category_name' => 'Vacum Cleaner',
            ],
            [
                'category_name' => 'Water Pump',
            ],
            [
                'category_name' => 'Water Dispener',
            ],
            [
                'category_name' => 'Water Heater',
            ],
            [
                'category_name' => 'Air Conditioner',
            ]
        ]);
    }
}