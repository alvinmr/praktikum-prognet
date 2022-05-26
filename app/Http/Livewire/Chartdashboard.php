<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class Chartdashboard extends Component
{
    public $trxs=[];
    public $chart_penjualans=[];
    public $chart_penjualans22=[];
    public $chart_penjualans23=[];
    public $input_thn= "22";
    public $cek= "22";

    public function render()
    {
        $now = Carbon::now('Asia/Makassar');
        $allTransactions = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->get();
        //dd($allTransactions);
        $this->allSales = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->count();
        $this->monthlySales = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->whereMonth('created_at', $now->month)->count();
        $this->annualSales = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->whereYear('created_at', $now->year)->count();
        $monthlyTransactions = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->whereMonth('created_at', $now->month)->get();
        $annualTranscations = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->whereYear('created_at', $this->input_thn)->get();
        //dd($allTransactions);
        $incomeTotal = 0;
        $incomeMonthly = 0;
        $incomeAnnual = 0;

        foreach ($allTransactions as $transaction) {
            $incomeTotal += $transaction->total;
        }
        $this->Pendapatantotal = $incomeTotal;

        foreach ($monthlyTransactions as $monthly) {
           $incomeMonthly += $monthly->total;
        }
        $this->Pendapatanbulan = $incomeMonthly;

        foreach ($annualTranscations as $annual) {
           $incomeAnnual += $annual->total;
        }
        $this->Pendapatantahunan = $incomeAnnual;

        $this->trxs = Transaction::with('transaction_details')->where([['status', '!=', 'Pending'], ['status', '!=', 'Belum Terbayar'], ['status', '!=', 'Expired']])->get();
        if($this->input_thn){
            $months = [1,2,3,4,5,6,7,8,9,10,11,12];
            $i = 0;
            foreach($months as $month){ 
                $penjualan = 0;
                $banyak_terjual = 0;
                if(!is_null($this->trxs)){
                    foreach($this->trxs as $trx){
                        if($trx->created_at->format('m') == $month && $trx->created_at->format('y') == $this->input_thn){
                            $penjualan = $penjualan+ $trx->total; 
                            $qty = 0; 
                        }
                    }
                }
                $this->chart_penjualans22[$i] = $penjualan;
                $i=$i+1;
                
            }
            $this->chart_penjualans = $this->chart_penjualans22;

        }else{
            $months = [1,2,3,4,5,6,7,8,9,10,11,12];
            $y = 0;
            foreach($months as $month){ 
                $penjualan = 0;
                $banyak_terjual = 0;
                if(!is_null($this->trxs)){
                    foreach($this->trxs as $trx){
                        if($trx->created_at->format('m') == $month && $trx->created_at->format('y') == $this->input_thn){
                            $penjualan = $penjualan+ $trx->total; 
                            $qty = 0; 
                        }
                    }
                }
                $this->chart_penjualans23[$y] = $penjualan;
                $y=$y+1;
                
            }$this->chart_penjualans = $this->chart_penjualans23;
        }
        
        return view('livewire.chartdashboard');
    }
}
