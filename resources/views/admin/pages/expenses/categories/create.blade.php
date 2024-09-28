@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Expense Category"
        displayButton="yes"
        buttonContent="All Expense Categories"
        buttonLink="{{ route('admin.billing.expenses.categories.index') }}"
    />

    <x-forms.form-main-errors/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.billing.expenses.categories.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Name" name="name" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Description" name="description" type="text" required="false" class="tinyEditor"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-lg-end">
                                <button type="submit" class="primaryOutlineBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
