<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index($id)
{
    $transaction = Transaction::findOrFail($id);
    return view('transactions.index')->with('transaction', $transaction);
}


    public function showCheckoutForm($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('transactions.checkout', compact('product'));
    }

    public function checkout(Request $request)
    {

        $product = Product::findOrFail($request->product_id);
        $invoiceNumber = 'INV-' . time();
        $uniqueCode = rand(100, 999);
        $total = $product->price + $uniqueCode;
        $expirationDate = now()->addHours(3);
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'invoice_number' => $invoiceNumber,
            'admin_fee' => 5000,
            'unique_code' => $uniqueCode,
            'total' => $total,
            'payment_method' => 'Bank Transfer',
            'status' => 'pending',
            'expiration_date' => $expirationDate,
        ]);
        return redirect()->route('transactions.index', ['id' => $transaction->id]);
    }
}
