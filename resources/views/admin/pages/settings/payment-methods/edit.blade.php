@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Settings - Edit {{ $pm->name }} Payment Method"
        displayButton="yes"
        buttonContent="All Payment Methods"
        buttonLink="{{ route('admin.settings.payment-methods.index') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.settings.payment-methods.update', $pm->id) }}" method="post" class="createEditForm">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $pm->name) }}" required>

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
