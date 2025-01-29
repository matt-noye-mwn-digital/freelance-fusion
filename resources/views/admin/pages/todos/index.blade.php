@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="All Todos"
        displayButton="yes"
        buttonContent="Create Todos"
        buttonLink="{{ route('admin.todos.create') }}"
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
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo->id }}</td>
                                    <td>{{ $todo->name }}</td>
                                    <td>{!! $todo->description !!}</td>
                                    <td>{{ date('d/m/y', strtotime($todo->due_date)) }}</td>
                                    <td>{{ $todo->status }}</td>
                                    <td class="actions">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="">View</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.todos.edit', $todo->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.todos.destroy', $todo->id) }}" method="post">
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
