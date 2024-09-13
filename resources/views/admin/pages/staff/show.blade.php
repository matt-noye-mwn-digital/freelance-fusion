@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="{{ $staff->first_name }} {{ $staff->last_name }}"
        displayButton="yes"
        buttonContent="All Staff Members"
        buttonLink="{{ route('admin.staff.index') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </section>
@endsection
