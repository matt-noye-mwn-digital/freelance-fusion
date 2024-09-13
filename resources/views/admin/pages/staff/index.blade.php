@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Staff"
        displayButton="yes"
        buttonContent="Create Staff Member"
        buttonLink="{{ route('admin.staff.create') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover w-100">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $staff)
                                <tr>
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->first_name }} {{ $staff->last_name }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{!! $staff->getStatus() !!}</td>
                                    <td>{{ date('d/m/Y', strtotime($staff->created_at)) }}</td>
                                    <td class="actions">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.staff.show', $staff->id) }}">View</a></li>
                                                <li><a href="">Edit</a></li>
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
    </section>
@endsection
