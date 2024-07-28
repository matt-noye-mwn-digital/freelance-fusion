@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Clients"
        displayButton="yes"
        buttonContent="Create Client"
        buttonLink=""
    />

    <section class="pageMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                    <td>
                                        @if($client->clientDetails->company_name)
                                            {{ $client->clientDetails->company_name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $client->email }}</td>
                                    <td>{!! $client->getStatus() !!}</td>
                                    <td>{{ date('d/m/Y', strtotime($client->created_at)) }}</td>
                                    <td class="actions">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.clients.show', $client->id) }}">View</a></li>
                                                <li><a href="{{ route('admin.clients.edit', $client->id) }}">Edit</a></li>
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
