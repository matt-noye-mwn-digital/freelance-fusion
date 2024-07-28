@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Client"
        displayButton="yes"
        buttonContent="All Clients"
        buttonLink="{{ route('admin.clients.index') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.clients.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="First Name" name="first_name" type="text" required="true"/>
                            </div>
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="Last name" name="last_name" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Company Name" name="company_name" type="text" required="false" />
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Email Address" name="email" type="email" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Phone Number" name="phone_number" type="tel" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Address Line One" name="address_line_one" type="text" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Address Line Two" name="address_line_two" type="text" required="false"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="City" name="city" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="State / Region" name="state_region" type="text" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Postcode" name="postcode" type="text" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Country" name="country" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="payment_method_id">Payment Method <span>*</span></label>
                                <select name="payment_method_id" id="payment_method_id" required>
                                    @foreach($paymentMethods as $pm)
                                        <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Currency <span>*</span></label>
                                <select name="currency" id="currency">
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->code }}" @if($currency->code == 'GBP') selected @endif>{{ $currency->code }} - {{ $currency->name }}</option>
                                    @endforeach
                                </select>
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
