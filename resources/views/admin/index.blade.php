@if (auth()->user()->role != 'Admin')
    <h1>You are not Administrator</h1>
    @php return; @endphp
@endif


@extends('layout')

@section('main')
    <div class="container-fluid">

        <div class="row row-cols-2">
            @include('admin.sidebar')
            <div class="col-10 py-2">
                <h1>Admin Dashboard</h1>
                <div class="row row-cols-lg-2 row-cols-md-auto my-auto">
                    <div>
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <span class="me-2 fs-5">Users</span>
                            </div>
                            <div class="card-body">
                                <canvas id="clients-chart" width="300" height="200"></canvas>
                                <div class="row row-cols-2 m-auto">
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="material-symbols-rounded text-primary fs-1">
                                            groups
                                        </span> <span>Clients :
                                            <span id="clients_count">
                                                {{ $counter['clients'] }}
                                                <span>
                                                </span>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="material-symbols-rounded text-success fs-1">
                                            engineering
                                        </span> <span>Maintenance Centers :
                                            <span id="mcs_count">
                                                {{ $counter['mcs'] }}<span>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <span class="me-2 fs-5"></i>Progress</span>

                            </div>
                            <div class="card-body">
                                <canvas id="tasks-chart" width="300" height="200"></canvas>
                                <div class="row row-cols-2 m-auto">
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="material-symbols-rounded text-warning fs-1">
                                            task
                                        </span> <span>Tasks :
                                            <span id="tasks_count">
                                                {{ $counter['tasks'] }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column align-items-center ">
                                        <span class="material-symbols-rounded text-info fs-1">
                                            comment
                                        </span>
                                        <span>Offers :
                                            <span id="offers_count">
                                                {{ $counter['offers'] }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/admin_charts.js') }}"></script>
@endsection
