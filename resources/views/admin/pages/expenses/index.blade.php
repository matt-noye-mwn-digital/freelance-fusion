@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="All Expenses"
        displayButton="yes"
        buttonContent="Create New Expense"
        buttonLink="{{ route('admin.billing.expenses.create') }}"
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
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Receipt</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->name }}</td>
                                        <td>
                                            @if($expense->category_id)
                                                {{ $expense->category->name }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>
                                            @if($expense->receipt)
                                                <a href="{{ asset('storage/' . $expense->receipt) }}" target="_blank">View</a>
                                            @else
                                                No Receipt Submitted
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($expense->expense_date)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($expense->created_at)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($expense->updated_at)) }}</td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    {{--<li>
                                                        <a href="{{ route('admin.billing.expenses.show', $expense->id) }}">View</a>
                                                    </li>--}}
                                                    <li>
                                                        <a href="{{ route('admin.billing.expenses.edit', $expense->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.billing.expenses.destroy', $expense->id) }}" method="post">
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
