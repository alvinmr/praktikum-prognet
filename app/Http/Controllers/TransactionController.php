<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Notifications\AdminNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function payment(Transaction $transaction)
    {
        if (auth()->user()->id !== $transaction->user_id) {
            return abort(404);
        }
        if ($transaction->timeout < Carbon::now()) {
            $transaction->update([
                'status' => 'Expired'
            ]);
        }
        return view('user.transaction.payment', compact('transaction'));
    }

    public function uploadProofPayment(Request $request, Transaction $transaction)
    {
        $request->validate([
            'proof_payment' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('proof_payment');
        $imageName = Str::slug(auth()->user()->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/proof_payment'), $imageName);

        $transaction->update([
            'proof_of_payment' => $imageName,
            'status' => 'Pending',
        ]);

        $user = Auth::user();
        $admin = Auth::guard('admin')->user();
        $dataAdmin = Admin::all();
        foreach ($dataAdmin as $admin) {
            $message = "Hallo " . $admin->username . ", user dengan nama " . $user->name . " telah berhasil mengupload bukti pembayaran dari Transaksi dengan produk yang dibeli yaitu " . $transaction->products[0]->product_name;
            Notification::send($admin, new AdminNotification($message));
        }


        return redirect()->route('payment', $transaction);
    }

    public function deleteTransaction(Transaction $transaction)
    {
        if (auth()->user()->id !== $transaction->user_id) {
            return abort(404);
        }
        $transaction->update([
            'status' => 'Dibatalkan'
        ]);
        return redirect()->route('my-transaction');
    }
}