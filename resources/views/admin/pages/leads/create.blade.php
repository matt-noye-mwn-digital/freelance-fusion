@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Lead"
        displayButton="yes"
        buttonContent="All Leads"
        buttonLink="{{ route('admin.leads.create') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.leads.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="First Name" name="first_name" type="text" required="true"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Last Name" name="last_name" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Email" name="email" type="email" required="true"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Phone Number" name="phone" type="tel"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Position" name="position" type="text"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Company Name" name="company_name" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Website" name="website" type="text"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Value" name="value" type="number"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Address Line One" name="address_line_one" type="text"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Address Line Two" name="address_line_two" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.text-input-field label="City" name="city" type="text"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field name="state" label="State" type="text"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Zip/Postcode" name="zip_postcode" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Country" name="country" type="text"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Lead Source" name="lead_source" type="text"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="status">Lead Status</label>
                                <select name="status" id="status" required>
                                    <option value="" selected disabled>-- Select a status --</option>
                                    <option value="new">New</option>
                                    <option value="on_hold">On Hold</option>
                                    <option value="contact_later">Contact Later</option>
                                    <option value="lost">Lost</option>
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
