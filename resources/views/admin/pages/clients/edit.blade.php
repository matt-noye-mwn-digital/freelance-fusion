@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Edit Client - {{ $client->first_name }} {{ $client->last_name }}"
        displayButton="yes"
        buttonContent="All Clients"
        buttonLink="{{ route('admin.clients.index') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.clients.update', $client->id) }}" method="post" class="createEditForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="First Name" name="first_name" type="text" value="{{ $client->first_name }}" required="true"/>
                            </div>
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="Last name" name="last_name" type="text" value="{{ $client->last_name }}" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Company Name" name="company_name" type="text" value="{{ $client->clientDetails->company_name }}" required="false" />
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Email Address" name="email" type="email" value="{{ $client->email }}" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Phone Number" name="phone_number" type="tel" value="{{ $client->clientDetails->phone_number }}" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Address Line One" name="address_line_one" type="text" value="{{ $client->clientDetails->address_line_one }}" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Address Line Two" name="address_line_two" type="text" value="{{ $client->clientDetails->address_line_two }}" required="false"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="City" name="city" type="text" value="{{ $client->clientDetails->city }}" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="State / Region" name="state_region" type="text" value="{{ $client->clientDetails->state_region }}" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Postcode" name="postcode" value="{{ $client->clientDetails->postcode }}" type="text" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Country" name="country" value="{{ $client->clientDetails->country }}" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="payment_method_id">Payment Method <span>*</span></label>
                                <select name="payment_method_id" id="payment_method_id" required>
                                    @foreach($paymentMethods as $pm)
                                        <option value="{{ $pm->id }}" @if($pm->id == $client->clientDetails->payment_method_id) selected @endif>{{ $pm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Currency <span>*</span></label>
                                <select name="currency" id="currency">
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->code }}" @if($currency->code == $client->clientDetails->currency) selected @endif>{{ $currency->code }} - {{ $currency->name }}</option>
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
