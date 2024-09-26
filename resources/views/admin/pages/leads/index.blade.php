@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Leads"
        displayButton="yes"
        buttonContent="Create Lead"
        buttonLink="{{ route('admin.leads.create') }}"
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
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Value</th>
                                    <th>Created</th>
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->full_name }}</td>
                                        <td>
                                            @if($lead->company_name)
                                                {{ $lead->company_name }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $lead->email }}</td>
                                        <td>
                                            @if($lead->value)
                                                {{ $lead->value }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($lead->created_at)) }}</td>
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
                                                        <a href="{{ route('admin.leads.edit', $lead->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="post">
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
