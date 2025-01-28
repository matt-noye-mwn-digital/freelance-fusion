@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="All Projects"
        displayButton="yes"
        buttonContent="Create Project"
        buttonLink="{{ route('admin.project-management.create') }}"
    />

    <secion class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                                    <a href="">Edit</a>
                                                </li>
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
    </secion>
@endsection
