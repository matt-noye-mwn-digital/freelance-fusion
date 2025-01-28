@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Create Project Type"
        displayButton="yes"
        buttonContent="All Project Types"
        buttonLink="{{ route('admin.project-management.project-types.index') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.project-management.project-types.store') }}" method="post" class="createEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <x-forms.text-input-field label="Project Type" name="name" type="text" value="{{ old('name') }}" required="true"/>
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
