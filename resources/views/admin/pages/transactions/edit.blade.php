@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Edit Transaction - {{ $transaction->transaction_id }}"
        displayButton="yes"
        buttonContent="All Transactions"
        buttonLink="{{ route('admin.billing.transactions.index') }}"
    />

    <x-forms.form-main-errors/>

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.billing.transactions.update', $transaction->id) }}" method="post" class="createEditForm">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field name="transaction_date" label="Transaction Date" type="date" required="true" value="{{ $transaction->transaction_date }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.select-input-field
                                    label="Related Client"
                                    name="client_id"
                                    :collection="$clients"
                                    :selectedValue="old('client_id', $transaction->client_id)"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Amount In" name="amount_in" type="number" value="{{ $transaction->amount_in }}"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Fees" name="fees" type="number" value="{{ $transaction->fees }}"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Amount Out" name="amount_out" type="number" value="{{ $transaction->amount_out }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field name="description" label="Description" type="text" required="true" value="{{ $transaction->description }}"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Transaction ID" name="transaction_id" type="text" required="true" value="{{ $transaction->transaction_id }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.select-input-field
                                    label="Payment Method"
                                    name="payment_method_id"
                                    :collection="$paymentMethods"
                                    :selectedValue="old('payment_method_id', $transaction->payment_method_id)"
                                    required="true"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-forms.select-input-field
                                    label="Add to clients credit balance"
                                    name="add_to_clients_balance"
                                    :options="['1' => 'Yes', '0' => 'No']"
                                    :selectedValue="old('add_to_clients_balance', $transaction->add_to_clients_balance)"
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
