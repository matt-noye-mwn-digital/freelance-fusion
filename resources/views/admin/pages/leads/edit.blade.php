@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Update Lead - {{ $lead->full_name }}"
        displayButton="yes"
        buttonContent="All Leads"
        buttonLink="{{ route('admin.leads.create') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.leads.update', $lead->id) }}" method="post" class="createEditForm">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="First Name" name="first_name" type="text" required="true" value="{{ $lead->first_name }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Last Name" name="last_name" type="text" required="true" value="{{ $lead->last_name }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Email" name="email" type="email" required="true" value="{{ $lead->email }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Phone Number" name="phone" type="tel" value="{{ $lead->phone }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Position" name="position" type="text" value="{{ $lead->position }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Company Name" name="company_name" type="text" value="{{ $lead->company_name }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Website" name="website" type="text" value="{{ $lead->website }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Value" name="value" type="number" value="{{ $lead->value }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Address Line One" name="address_line_one" type="text" value="{{ $lead->address_line_one }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Address Line Two" name="address_line_two" type="text" value="{{ $lead->address_line_two }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.text-input-field label="City" name="city" type="text" value="{{ $lead->city }}"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field name="state" label="State" type="text" value="{{ $lead->state }}"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Zip/Postcode" name="zip_postcode" type="text" value="{{ $lead->zip_postcode }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Country" name="country" type="text" value="{{ $lead->country }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Lead Source" name="lead_source" type="text" value="{{ $lead->lead_source }}"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="status">Lead Status</label>
                                <select name="status" id="status" required>
                                    <option value="new" @if($lead->status == 'new') selected @endif>New</option>
                                    <option value="on_hold" @if($lead->status == 'on_hold') selected @endif>On Hold</option>
                                    <option value="contact_later" @if($lead->status == 'contact_later') selected @endif>Contact Later</option>
                                    <option value="lost" @if($lead->status == 'lost') selected @endif>Lost</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Lead Source" name="lead_source" type="text"/>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 d-lg-flex justify-content-lg-end">
                                <button type="submit" class="primaryOutlineBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
