<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryDetail;
use App\Models\ProductImage;

class ProductCreate extends Component
{
    public $category;

    public function render()
    {
        $this->category = ProductCategory::latest()->get();
        return view('livewire.product-create');
    }
}
