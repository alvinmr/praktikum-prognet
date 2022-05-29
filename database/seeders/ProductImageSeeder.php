<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::insert([
            [
                'product_id' => '1',
                'image_name' => '/assets/images/product-images/kipas1.png',
            ],
            [
                'product_id' => '1',
                'image_name' => '/assets/images/product-images/kipas2.png',
            ],
            [
                'product_id' => '1',
                'image_name' => '/assets/images/product-images/kipas3.png',
            ],
            [
                'product_id' => '2',
                'image_name' => '/assets/images/product-images/kipas4.jpg',
            ],  [
                'product_id' => '2',
                'image_name' => '/assets/images/product-images/kipas5.jpg',
            ],
            [
                'product_id' => '2',
                'image_name' => '/assets/images/product-images/kipas6.jpg',
            ],  [
                'product_id' => '3',
                'image_name' => '/assets/images/product-images/vacum1.jpg',
            ],
            [
                'product_id' => '4',
                'image_name' => '/assets/images/product-images/vacum.png',
            ],
            [
                'product_id' => '4',
                'image_name' => '/assets/images/product-images/vacum3.jpg',
            ],  
            [
                'product_id' => '5',
                'image_name' => '/assets/images/product-images/waterpump.jpg',
            ],
            [
                'product_id' => '6',
                'image_name' => '/assets/images/product-images/dispenser2.jpg',
            ],
            [
                'product_id' => '7',
                'image_name' => '/assets/images/product-images/waterheat.png',
            ],
            [
                'product_id' => '8',
                'image_name' => '/assets/images/product-images/dispenser1.jpg',
            ],
            [
                'product_id' => '9',
                'image_name' => '/assets/images/product-images/ac3.jpg',
            ],
            [
                'product_id' => '9',
                'image_name' => '/assets/images/product-images/ac4.jpg',
            ],
            [
                'product_id' => '10',
                'image_name' => '/assets/images/product-images/ac1.jpg',
            ],
            [
                'product_id' => '10',
                'image_name' => '/assets/images/product-images/ac2.jpg',
            ],
            ]);
    }
}