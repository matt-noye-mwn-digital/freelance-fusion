@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Settings - Payment Methods"
        displayButton="yes"
        buttonContent="Create Payment Method"
        buttonLink="{{ route('admin.settings.payment-methods.create') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentMethods as $pm)
                                    <tr>
                                        <td>{{ $pm->id }}</td>
                                        <td>{{ $pm->name }}</td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="">View</a></li>
                                                    <li><a href="{{ route('admin.settings.payment-methods.edit', $pm->id) }}">Edit</a></li>
                                                    <li>
                                                        <form action="" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
