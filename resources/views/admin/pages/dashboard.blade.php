@extends('layouts.admin')
@section('content')
    <x-admin.page-hero
        title="Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
        displayButton="no"
    />

    <section class="dashboardContentWrapper">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card dashboardStatsCard">
                        <div class="card-body">
                            <h5>5</h5>
                            <h6>Unpaid Invoices</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboardStatsCard">
                        <div class="card-body">
                            <h5>85</h5>
                            <h6>Clients</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboardStatsCard">
                        <div class="card-body">
                            <h5>2</h5>
                            <h6>Unanswered Support Tickets</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboardStatsCard">
                        <div class="card-body">
                            <h5>4</h5>
                            <h6>Projects</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="card dashboardScrollCard">
                        <div class="card-header">
                            <h5></h5>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card dashboardScrollCard">
                        <div class="card-header">
                            <h5>Todo List</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach($todos as $todo)
                                    <li>
                                        <a href="{{ route('admin.todos.show', $todo->id) }}">
                                            <h6>{{ $todo->name }}</h6>
                                            {!! $todo->description !!}
                                            <div class="overviewInfo">

                                                {!! $todo->getStatus() !!}

                                                <div>
                                                    <span>Assigned To:</span>{{ $todo->assignedTo->first_name }} {{ $todo->assignedTo->last_name }}
                                                </div>

                                                <div>
                                                    <span>Due Date:</span> {{ date('d/m/Y', strtotime($todo->due_date)) }}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
