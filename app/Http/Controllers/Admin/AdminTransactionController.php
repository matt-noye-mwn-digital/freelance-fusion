<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('transaction_date', 'desc')->get();

        return view('admin.pages.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::Role(['client', 'customer'])->orderBy('first_name', 'asc')->get();
        $paymentMethods = PaymentMethod::orderBy('name', 'asc')->get();
        $currencies = Currency::orderBy('name', 'asc')->get();

        return view('admin.pages.transactions.create', compact('clients', 'paymentMethods', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_date' => ['required', 'date'],
            'client_id' => ['nullable', 'integer'],
            'description' => ['nullable', 'string', 'max:750'],
            'transaction_id' => ['required', 'string', 'max:255'],
            'payment_method_id' => ['required', 'integer'],
            'amount_in' => ['nullable', 'numeric'],
            'fees' => ['nullable', 'numeric'],
            'amount_out' => ['nullable', 'numeric'],
            'add_to_clients_balance' => ['nullable', 'boolean'],
        ]);

        Transaction::create($validated);

        return redirect()->route('admin.billing.transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $clients = User::Role(['client', 'customer'])->orderBy('first_name', 'asc')->get();
        $paymentMethods = PaymentMethod::orderBy('name', 'asc')->get();
        $currencies = Currency::orderBy('name', 'asc')->get();

        return view('admin.pages.transactions.edit', compact('transaction', 'clients', 'paymentMethods', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'transaction_date' => ['required', 'date'],
            'client_id' => ['nullable', 'integer'],
            'description' => ['nullable', 'string', 'max:750'],
            'transaction_id' => ['required', 'string', 'max:255'],
            'payment_method_id' => ['required', 'integer'],
            'amount_in' => ['nullable', 'numeric'],
            'fees' => ['nullable', 'numeric'],
            'amount_out' => ['nullable', 'numeric'],
            'add_to_clients_balance' => ['nullable', 'boolean'],
        ]);

        $transaction->update($validated);

        return redirect()->route('admin.billing.transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        if($transaction->delete()) {
            $transaction->delete();
            return redirect()->route('admin.billing.transactions.index')->with('success', 'Transaction deleted successfully.');
        }
        else {
            return redirect()->route('admin.billing.transactions.index')->with('error', 'Transaction could not be deleted.');
        }
    }
}
