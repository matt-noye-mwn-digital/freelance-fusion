@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Project"
        displayButton="yes"
        buttonContent="All Projects"
        buttonLink="{{ route('admin.project-management.index') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.project-management.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Project Name" name="name" type="text" required="true"/>
                            </div>
                            <div class="col-md-6">
                                <label for="project_type_id">Project Type <span>*</span></label>
                                <select name="project_type_id" id="project_type_id" required>
                                    @foreach($projectTypes as $pt)
                                        <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                    @endforeach
                                </select>
                                <x-forms.form-field-errors name="project_type_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="client_id">Client</label>
                                <select name="client_id" id="client_id">
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                    @endforeach
                                </select>
                                <x-forms.form-field-errors name="client_id"/>
                            </div>
                            <div class="col-md-6">
                                <label for="client_id">Staff Member <span>*</span></label>
                                <select name="staff_id" id="staff_id" required>
                                    @foreach($staff as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->first_name }} {{ $staff->last_name }}</option>
                                    @endforeach
                                </select>
                                <x-forms.form-field-errors name="staff_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Project Status <span>*</span></label>
                                <select name="project_status" id="project_status" required>
                                    @foreach($projectStatuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <x-forms.form-field-errors name="project_status"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Progress" name="progress" type="number" required="false"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Billing Type <span>*</span></label>
                                <select name="billing_type" id="billing_type" required>
                                    <option selected disabled>-- Choose a billing Type --</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="fixed_rate">Fixed Rate</option>
                                </select>
                                <x-forms.form-field-errors name="billing_type"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Estimated Hours" name="estimated_hours" type="number" required="false"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Start Date" name="start_date" type="date" required="true"/>
                            </div>
                            <div class="col-md-6">
                                <x-forms.text-input-field label="Due Date" name="due_date" type="date" required="false"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Description" name="description" type="textarea" isTinyEditor="yes" required="true"/>
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
