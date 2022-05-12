<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        return redirect()->route('payment', $transaction);
    }

    public function deleteTransaction(Transaction $transaction)
    {
        if (auth()->user()->id !== $transaction->user_id) {
            return abort(404);
        }
        $transaction->delete();
        return redirect()->route('my-transaction');
    }
}