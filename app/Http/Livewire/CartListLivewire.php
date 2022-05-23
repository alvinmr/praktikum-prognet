<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Courier;
use App\Models\Province;
use Livewire\Component;

class CartListLivewire extends Component
{
    public $subtotal = 0;
    public $provinces;
    public $id_province = '';
    public $cities;
    public $id_city = '';
    public $id_courier = '';
    public $cost = 0;
    public $weight = 0;
    public $isLoading = false;

    public function render()
    {
        $carts = Cart::with('product')->whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->get();
        $this->provinces = Province::all();
        $couriers = Courier::all('courier', 'id');
        return view('livewire.cart-list', compact('carts', 'couriers'));
    }

    public function deleteItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        $this->emit('itemDeleted');
    }

    public function decrementQty($id)
    {
        $cart = Cart::find($id);
        if ($cart->product->stock > 0) {
            if ($cart->qty > 1) {
                $cart->qty -= 1;
                $cart->product->stock += 1;
                $cart->save();
            } else {
                $this->deleteItem($id);
            }
        }

        $this->emit('itemDecremented');
    }

    public function incrementQty($id)
    {
        $cart = Cart::find($id);
        $cart->qty += 1;
        $cart->product->stock -= 1;
        $cart->save();
        $this->emit('itemIncremented');
    }

    public function checkout()
    {
        return redirect()->route('checkout');
    }
}