@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Staff Member"
        displayButton="yes"
        buttonContent="All Staff Members"
        buttonLink="{{ route('admin.staff.index') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.staff.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="First Name" name="first_name" type="text" required="true"/>
                            </div>
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="Last Name" name="last_name" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Email Address" name="email" type="email" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="Password" name="password" type="password" required="true"/>
                            </div>
                            <div class="col-lg-6">
                                <x-forms.text-input-field label="Confirm Password" name="password_confirmation" required="true"/>
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
