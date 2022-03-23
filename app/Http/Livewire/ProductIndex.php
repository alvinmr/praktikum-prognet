<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductIndex extends Component
{
    public $data;

    public function render()
    {
        $this->data = Product::latest()->get();
        return view('livewire.product-index');
    }
}
