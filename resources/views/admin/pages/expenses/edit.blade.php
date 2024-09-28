@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Edit Expense - {{ $expense->name }}"
        displayButton="yes"
        buttonContent="All Expenses"
        buttonLink="{{ route('admin.billing.expenses.index') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.billing.expenses.update', $expense->id) }}" method="post" class="createEditForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Name" name="name" type="text" required="true"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Amount" name="amount" type="number" step="any" required="true"/>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Expense Date" name="expense_date" type="date" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="client_id">Customer / Client</label>
                                <select name="user_id" id="user_id" required>
                                    <option value="" selected disabled>Select Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="expense_category_id">Expense Category <span>*</span></label>
                                <select name="expense_category_id" id="expense_category_id" required>
                                    <option value="" selected disabled>Select Expense Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <x-forms.text-input-field label="Reference" name="ref_no" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="currency_id">Currency <span>*</span></label>
                                <select name="currency_id" id="currency_id"  required>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}" @if($currency->code == 'GBP') selected @endif >{{ $currency->code }} {{ $currency->symbol }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="tax_amount_one">Tax</label>
                                <select name="tax_amount_one" id="tax_amount_one">
                                    <option value="0">0</option>
                                    <option value="10">10</option>
                                    <option value="18">18</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="payment_method_id">Payment Method</label>
                                <select name="payment_method_id" id="payment_method_id">
                                    @foreach($paymentMethods as $pm)
                                        <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="invoiced">Has this been invoiced?</label>
                                <select name="invoiced" id="invoiced">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Receipt" name="receipt" type="file" accept="image/*"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Notes" name="note" type="textarea" isTinyEditor="yes"/>
                            </div>
                        </div>
                        <div class="row mt-4">
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
