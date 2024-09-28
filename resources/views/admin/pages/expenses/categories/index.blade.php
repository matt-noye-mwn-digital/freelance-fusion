@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Expense Categories"
        display-button="yes"
        button-content="Create Expense Category"
        button-link="{{ route('admin.billing.expenses.categories.create') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ date('d/m/Y', strtotime($category->created_at)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($category->updated_at)) }}</td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.billing.expenses.categories.edit', $category->id) }}">Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.billing.expenses.categories.destroy', $category->id) }}" method="post">
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
