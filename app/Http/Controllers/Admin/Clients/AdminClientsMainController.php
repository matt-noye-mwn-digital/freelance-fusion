<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\ClientDetail;
use App\Models\Currency;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Symfony\Component\String\b;

class AdminClientsMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = User::role('client')->orderBy('id', 'DESC')->get();
        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentMethods = PaymentMethod::orderBy('name', 'ASC')->get();
        $currencies = Currency::orderBy('name', 'ASC')->get();

        return view('admin.pages.clients.create', compact('paymentMethods', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'company_name' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'address_line_one' => ['required', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state_region' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'payment_method_id' => ['required', 'integer', 'exists:payment_methods,id'],
            'currency' => ['required', 'string'],
        ]);

        $password = Str::random(20);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($password)
        ]);

        $user->assignRole('client');

        $clientDetails = ClientDetail::create([
            'client_id' => $user->id,
            'company_name' => $validated['company_name'],
            'phone_number' => $validated['phone_number'],
            'address_line_one' => $validated['address_line_one'],
            'address_line_two' => $validated['address_line_two'],
            'city' => $validated['city'],
            'state_region' => $validated['state_region'],
            'postcode' => $validated['postcode'],
            'country' => $validated['country'],
            'payment_method_id' => $validated['payment_method_id'],
            'currency' => $validated['currency'],
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new client called: ' . $user->first_name . ' ' . $user->last_name);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = User::findOrFail($id);

        return view('admin.pages.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = User::findOrFail($id);
        $paymentMethods = PaymentMethod::orderBy('name', 'ASC')->get();
        $currencies = Currency::orderBy('name', 'ASC')->get();

        return view('admin.pages.clients.edit', compact('client', 'paymentMethods', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = User::find($id);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'sometimes|email|unique:users,email,' . $id,

            'company_name' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'address_line_one' => ['required', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state_region' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'payment_method_id' => ['required', 'integer', 'exists:payment_methods,id'],
            'currency' => ['required', 'string'],
        ]);

        // Prepare the update array
        $updateData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
        ];

        // Check if email is provided and different from current
        if ($request->has('email') && $request->email !== $client->email) {
            $updateData['email'] = $validated['email'];
        }

        // Update the user
        $client->update($updateData);

        // Update client details
        $client->clientDetails->update([
            'client_id' => $client->id,
            'company_name' => $validated['company_name'],
            'phone_number' => $validated['phone_number'],
            'address_line_one' => $validated['address_line_one'],
            'address_line_two' => $validated['address_line_two'],
            'city' => $validated['city'],
            'state_region' => $validated['state_region'],
            'postcode' => $validated['postcode'],
            'country' => $validated['country'],
            'payment_method_id' => $validated['payment_method_id'],
            'currency' => $validated['currency'],
        ]);

        // Log activity
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated client: ' . $client->first_name . ' ' . $client->last_name);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
