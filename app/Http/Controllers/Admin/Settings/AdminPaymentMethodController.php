<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class AdminPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return view('admin.pages.settings.payment-methods.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.settings.payment-methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        PaymentMethod::create([
            'name' => $validated['name'],
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new payment method called: ' . $validated['name']);

        return redirect()->route('admin.settings.payment-methods.index')->with('success', 'Payment method created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pm = PaymentMethod::where('id', $id)->first();

        return view('admin.pages.settings.payment-methods.show', compact('pm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pm = PaymentMethod::where('id', $id)->first();

        return view('admin.pages.settings.payment-methods.edit', compact('pm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pm = PaymentMethod::where('id', $id)->first();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $pm->update([
            'name' => $validated['name'],
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated a payment method called: ' . $validated['name']);

        return redirect()->route('admin.settings.payment-methods.index')->with('success', 'Payment method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
