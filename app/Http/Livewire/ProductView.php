<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryDetail;
use App\Models\ProductImage;


class ProductView extends Component
{
    public $data;
    
    public function render()
    {
        $this->data = Product::latest()->get();
        return view('livewire.product-view');
    }
}
