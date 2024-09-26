<?php

namespace App\Http\Controllers\Admin\Leads;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class AdminLeadMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->get();

        return view('admin.pages.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'value' => ['nullable', 'integer'],
            'address_line_one' => ['nullable', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'zip_postcode' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'lead_source' => ['nullable', 'string', 'max:255']
        ]);

        Lead::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'full_name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'company_name' => $validated['company_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'website' => $validated['website'],
            'position' => $validated['position'],
            'value' => $validated['value'],
            'address_line_one' => $validated['address_line_one'],
            'address_line_two' => $validated['address_line_two'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip_postcode' => $validated['zip_postcode'],
            'country' => $validated['country'],
            'status' => $validated['status'],
            'lead_source' => $validated['lead_source']
        ]);

        return redirect()->route('admin.leads.index')->with('success', 'Lead created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lead = Lead::findOrFail($id);

        return view('admin.pages.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lead = Lead::findOrFail($id);

        return view('admin.pages.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lead = Lead::findOrFail($id);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'value' => ['nullable', 'integer'],
            'address_line_one' => ['nullable', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'zip_postcode' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'lead_source' => ['nullable', 'string', 'max:255']
        ]);

        $lead->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'full_name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'company_name' => $validated['company_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'website' => $validated['website'],
            'position' => $validated['position'],
            'value' => $validated['value'],
            'address_line_one' => $validated['address_line_one'],
            'address_line_two' => $validated['address_line_two'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip_postcode' => $validated['zip_postcode'],
            'country' => $validated['country'],
            'status' => $validated['status'],
            'lead_source' => $validated['lead_source']
        ]);

        return redirect()->route('admin.leads.index')->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lead = Lead::findOrFail($id);

        if($lead->delete()){
            $lead->delete();
            return redirect()->route('admin.leads.index')->with('success', 'Lead deleted successfully.');
        }
    }
}
