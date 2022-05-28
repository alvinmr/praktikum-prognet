<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class Chartdashboard extends Component
{
    public $trxs = [];
    public $chart_penjualans = [];
    public $totalTransaction = 0;
    public $input_thn = "";
    public $cek = "22";

    public function updatedInputThn()
    {
        // make array of transaction data per year
        $now = Carbon::now('Asia/Makassar');

        for ($i = 1; $i <= 12; $i++) {
            $this->chart_penjualans[$i] = Transaction::whereMonth('created_at', $i)->whereYear('created_at', $this->input_thn)->where('status', 'Telah Sampai')->get()->sum('total');
        }
        $this->totalTransaction = Transaction::where('status', 'Telah Sampai')->whereYear('created_at', $this->input_thn)->get()->sum('total');
        $this->emit('yearUpdated', $this->chart_penjualans);
    }

    public function mount()
    {
        $now = Carbon::now('Asia/Makassar');
        $this->totalTransaction = Transaction::where('status', 'Telah Sampai')->whereYear('created_at', $now->year)->get()->sum('total');
    }

    public function render()
    {
        $now = Carbon::now('Asia/Makassar');

        $this->allSales = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->count();
        $this->monthlySales = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->whereMonth('created_at', $now->month)->count();
        $this->annualSales = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->whereYear('created_at', $now->year)->count();

        for ($i = 1; $i <= 12; $i++) {
            $this->chart_penjualans[$i] = Transaction::whereMonth('created_at', $i)->whereYear('created_at', $now->year)->where('status', 'Telah Sampai')->get()->sum('total');
        }

        return view('livewire.chartdashboard');
    }
}