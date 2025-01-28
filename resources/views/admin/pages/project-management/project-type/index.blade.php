@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Project Types"
        displayButton="yes"
        buttonContent="Create Project Type"
        buttonLink="{{ route('admin.project-management.project-types.create') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>Project Type</th>
                                <th>Created</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projectTypes as $projectType)
                                <tr>
                                    <td>{{ $projectType->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($projectType->created_at)) }}</td>
                                    <td class="actions">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.project-management.project-types.edit', $projectType->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('admin.project-management.project-types.destroy', $projectType->id) }}" method="post">
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
