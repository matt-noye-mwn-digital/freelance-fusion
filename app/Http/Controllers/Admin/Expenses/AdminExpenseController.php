<?php

namespace App\Http\Controllers\Admin\Expenses;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::orderBy('created_at', 'desc')->get();

        return view('admin.pages.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ExpenseCategory::all();
        $currencies = Currency::all();
        $paymentMethods = PaymentMethod::all();
        $clients = User::role(['customer', 'client'])->orderBy('full_name', 'asc')->get();

        return view('admin.pages.expenses.create', compact('categories', 'currencies', 'paymentMethods', 'clients'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'currency_id' => ['nullable', 'integer'],
            'amount' => ['required', 'numeric'],
            'expense_date' => ['required', 'date'],
            'tax_amount_one' => ['nullable', 'numeric'],
            'tax_amount_two' => ['nullable', 'numeric'],
            'ref_no' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable'],
            'receipt' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg'],
            'client_id' => ['nullable', 'integer'],
            'invoiced' => ['required', 'boolean'],
            'payment_method_id' => ['nullable', 'integer'],
        ]);

        $receiptPath = NULL;

        if($request->hasFile($validated['receipt'])){
            $receipt = $request->file('receipt');
            $fileName = time() . '_' . $receipt->getClientOriginalName();
            $folder = 'public/uploads';

            $receiptPath = $receipt->storeAs($folder, $fileName);
        }
        else {
            $receiptPath = NULL;
        }

        Expense::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'currency_id' => $validated['currency_id'],
            'amount' => $validated['amount'],
            'expense_date' => $validated['expense_date'],
            'tax_amount_one' => $validated['tax_amount_one'] ?? null,
            'tax_amount_two' => $validated['tax_amount_two'] ?? null,
            'ref_no' => $validated['ref_no'] ?? null,
            'note' => $validated['note'] ?? null,
            'receipt' => $receiptPath,
            'client_id' => $validated['client_id'] ?? null,
            'invoiced' => $validated['invoiced'],
            'payment_method_id' => $validated['payment_method_id'] ?? null,
        ]);

        return redirect()->route('admin.billing.expenses.index')->with('success', 'Expense created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::findOrFail($id);

        $categories = ExpenseCategory::all();
        $currencies = Currency::all();
        $paymentMethods = PaymentMethod::all();
        $clients = User::role(['customer', 'client'])->orderBy('full_name', 'asc')->get();

        return view('admin.pages.expenses.edit', compact('expense', 'categories', 'currencies', 'paymentMethods', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expense = Expense::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'currency_id' => ['nullable', 'integer'],
            'amount' => ['required', 'numeric'],
            'expense_date' => ['required', 'date'],
            'tax_amount_one' => ['nullable', 'numeric'],
            'tax_amount_two' => ['nullable', 'numeric'],
            'ref_no' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable'],
            'receipt' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg'],
            'client_id' => ['nullable', 'integer'],
            'invoiced' => ['required', 'boolean'],
            'payment_method_id' => ['nullable', 'integer'],
        ]);

        if($request->hasFile($validated['receipt'])){
            $receipt = $request->file('receipt');
            $fileName = time() . '_' . $receipt->getClientOriginalName();
            $folder = 'public/uploads';

            $receiptPath = $receipt->storeAs($folder, $fileName);
        }
        else {
            $receiptPath = $expense->receipt;
        }

        $expense->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'currency_id' => $validated['currency_id'],
            'amount' => $validated['amount'],
            'expense_date' => $validated['expense_date'],
            'tax_amount_one' => $validated['tax_amount_one'] ?? null,
            'tax_amount_two' => $validated['tax_amount_two'] ?? null,
            'ref_no' => $validated['ref_no'] ?? null,
            'note' => $validated['note'] ?? null,
            'receipt' => $receiptPath,
            'client_id' => $validated['client_id'] ?? null,
            'invoiced' => $validated['invoiced'],
            'payment_method_id' => $validated['payment_method_id'] ?? null,
        ]);

        return redirect()->route('admin.billing.expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::findOrFail($id);
        $receipt = $expense->receipt;

        if($expense->delete()){
            if($receipt){
                Storage::delete($receipt);
            }

            $expense->delete();

            return redirect()->route('admin.billing.expenses.index')->with('success', 'Expense deleted successfully.');
        }
    }
}
