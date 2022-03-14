<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CheckoutLivewire extends Component
{
    public $provinces;
    public $cities;
    public $courier;
    public $carts;
    public $cost = 0;
    public $subtotal = 0;
    public $weight = 0;
    public $address;
    public $id_province = '';
    public $id_city = '';
    public $id_courier = '';

    protected $rules = [
        'address' => 'required|min:6',
    ];

    public function render()
    {
        $this->sumSubtotal();
        $this->sumWeight();
        $this->provinces = Province::all();
        $this->carts = Cart::with('product')->whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->get();
        $this->couriers = Courier::all('courier', 'id');
        return view('livewire.checkout');
    }

    public function updatedIdProvince()
    {
        $this->cities = Province::find($this->id_province)->cities;
    }


    public function checkCost()
    {
        $this->validate();

        $this->cost = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY'),
            'content-type' => 'application/x-www-form-urlencoded'
        ])->asForm()->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => '114',
            'destination' => $this->id_city,
            'weight' => $this->weight,
            'courier' => Courier::find($this->id_courier)->courier
        ])->json()['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
    }

    public function sumSubtotal()
    {
        $cart = Cart::with('product')->whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->get();
        $this->subtotal = 0;
        foreach ($cart as $item) {
            $this->subtotal += $item->product->price * $item->qty;
        }
    }

    public function sumWeight()
    {
        $cart = Cart::with('product')->whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->get();
        $this->weight = 0;
        foreach ($cart as $item) {
            $this->weight += $item->product->weight * $item->qty;
        }
    }

    public function checkout()
    {
        $this->validate();

        $cart = Cart::with('product')->whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->get();
        $trx = Transaction::create([
            'timeout' => Carbon::now()->addDay(),
            'address' => $this->address,
            'regency' => City::find($this->id_city)->title,
            'province' => Province::find($this->id_province)->title,
            'total' => $this->subtotal + $this->cost,
            'shipping_cost' => $this->cost,
            'sub_total' => $this->subtotal,
            'user_id' => auth()->user()->id,
            'courier_id' => $this->id_courier,
            'status' => 'Belum Terbayar'
        ]);
        foreach ($cart as $item) {
            TransactionDetail::create([
                'transaction_id' => $trx->id,
                'product_id' => $item->product->id,
                'qty' => $item->qty,
                'discount' => 0,
                'selling_price' => $item->product->price * (1 - 0 / 100)
            ]);
            $item->product->stock -= $item->qty;
            $item->product->save();
        }
        Cart::whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->delete();
        return redirect()->route('payment', $trx->id);
    }
}