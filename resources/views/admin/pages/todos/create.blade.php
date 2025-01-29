@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Todo"
        displayButton="yes"
        buttonContent="All Todos"
        buttonLink="{{ route('admin.todos.index') }}"
    />

    <x-forms.form-main-errors />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.todos.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Name" name="name" type="text" required="true"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Description" name="description" type="textarea" isTinyEditor="yes"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <x-forms.text-input-field label="Due Date" name="due_date" type="date" required="true"/>
                            </div>
                            <div class="col-lg-4">
                                <label for="status">Status</label>
                                <select name="status" id="status" required>
                                    <option value="new">New</option>
                                    <option value="pending">Pending</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="postponed">Postponed</option>
                                </select>
                                <x-forms.form-field-errors name="status"/>
                            </div>
                            <div class="col-lg-4">
                                <label for="assigned_to">Assigned to</label>
                                <select name="assigned_to" id="assigned_to">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                    @endforeach
                                </select>
                                <x-forms.form-field-errors name="assigned_to"/>
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
