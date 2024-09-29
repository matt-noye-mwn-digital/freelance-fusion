@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Transaction"
        displayButton="yes"
        buttonContent="All Transactions"
        buttonLink="{{ route('admin.billing.transactions.index') }}"
    />

    <x-forms.form-main-errors/>

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.billing.transactions.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field name="transaction_date" label="Transaction Date" type="date" required="true"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.select-input-field
                                    label="Related Client"
                                    name="client_id"
                                    :collection="$clients"
                                    :selectedValue="old('client_id')"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Amount In" name="amount_in" type="number"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Fees" name="fees" type="number"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Amount Out" name="amount_out" type="number"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field name="description" label="Description" type="text" required="true"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Transaction ID" name="transaction_id" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.select-input-field
                                    label="Payment Method"
                                    name="payment_method_id"
                                    :collection="$paymentMethods"
                                    :selectedValue="old('payment_method_id')"
                                    required="true"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-forms.select-input-field
                                    label="Add to clients credit balance"
                                    name="add_to_clients_balance"
                                    :options="['1' => 'Yes', '0' => 'No']"
                                    :selectedValue="old('add_to_clients_balance')"
                                />
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
