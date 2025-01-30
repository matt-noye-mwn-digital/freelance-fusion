@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        Title="View {{ $todo->name }}"
        displayButton="yes"
        buttonContent="All Todos"
        buttonLink="{{ route('admin.todos.index') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-end">
                    <div class="dropdown showPageActionsDropdown">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown">Actions</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('admin.todos.edit', $todo->id) }}" >Edit</a>
                            <form action="" method="post">
                                @csrf
                                <button type="submit">Mark as completed</button>
                            </form>
                            <form action="{{ route('admin.todos.destroy', $todo->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table w-100">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $todo->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $todo->description !!}</td>
                            </tr>
                            <tr>
                                <th>Due Date</th>
                                <td>{{ date('d/m/y', strtotime($todo->due_date)) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{!! $todo->getStatus() !!}</td>
                            </tr>
                            <tr>
                                <th>Assigned to</th>
                                <td>
                                    @if($todo->assignedTo)
                                        {{ $todo->assignedTo->first_name }} {{ $todo->assignedTo->last_name }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
