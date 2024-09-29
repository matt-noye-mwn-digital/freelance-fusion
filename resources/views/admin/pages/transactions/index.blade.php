@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Transactions"
        displayButton="yes"
        buttonContent="Add Transaction"
        buttonLink="{{ route('admin.billing.transactions.create') }}"
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Description</th>
                                    <th>Amount In</th>
                                    <th>Fees</th>
                                    <th>Amount Out</th>
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>
                                            @if($transaction->client_id)

                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($transaction->transaction_date)) }}</td>
                                        <td>
                                            @if($transaction->payment_method_id)
                                                {{ $transaction->paymentMethod->name }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            {{ $transaction->description }}
                                        </td>
                                        <td>
                                            @if($transaction->amount_in)
                                                £{{ number_format($transaction->amount_in, 2) }}
                                            @else
                                                £0.00
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->fees)
                                                £{{ number_format($transaction->fees, 2) }}
                                            @else
                                                £0.00
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->amount_out)
                                                £{{ number_format($transaction->amount_out, 2) }}
                                            @else
                                                £0.00
                                            @endif
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.billing.transactions.edit', $transaction->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.billing.transactions.destroy', $transaction->id) }}" method="post">
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
