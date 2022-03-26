<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.product', compact('products'));
    }

    public function addToCart($id)
    {
        $cart = Cart::whereUserId(auth()->user()->id)->whereProductId($id)->first();
        if ($cart) {
            $cart->qty++;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'qty' => 1,
                'status' => 'Dalam Keranjang'
            ]);
        }
        $this->emit('addedToCart');
    }
}