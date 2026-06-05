@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Admin Dashboard</h2>

            <small class="text-muted">
                Welcome {{ auth()->user()->name }}
            </small>
        </div>

    </div>

    <!-- Summary Cards -->

    <div class="row">

        <div class="col-md-6">

            <div class="card bg-primary text-white mb-3 shadow">

                <div class="card-body text-center">

                    <h5>Total Persons</h5>

                    <h1>{{ $personCount }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card bg-success text-white mb-3 shadow">

                <div class="card-body text-center">

                    <h5>Total Users</h5>

                    <h1>{{ $userCount }}</h1>

                </div>

            </div>

        </div>

    </div>

    <!-- Buttons -->

    <div class="mb-4">

        <a href="/persons/create"
           class="btn btn-primary">
            Add New Person
        </a>

        <a href="/persons"
           class="btn btn-secondary">
            View Persons
        </a>

        @if(auth()->user()->role == 'admin')

            <a href="/users"
               class="btn btn-warning">
                User Management
            </a>

        @endif

        <a href="/reports"
           class="btn btn-info">
            Reports
        </a>

    </div>

    <!-- District Chart -->

    <div class="card mb-4 shadow">

        <div class="card-header bg-dark text-white">
            Persons By District
        </div>

        <div class="card-body">
            <canvas id="districtChart"></canvas>
        </div>

    </div>

    <!-- Recent Persons -->

    <div class="card shadow">

        <div class="card-header bg-info text-white">
            Recent Persons
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>District</th>
                    </tr>

                </thead>

                <tbody>

                @foreach($recentPersons as $person)

                    <tr>

                        <td>{{ $person->id }}</td>
                        <td>{{ $person->full_name }}</td>
                        <td>{{ $person->district }}</td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <hr>

    <div class="text-center text-muted mt-4">
        Created By Tharaka Wijesinghe |
        Contact : 0761819586
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('districtChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: {!! json_encode($districtData->keys()) !!},

        datasets: [{

            label: 'Persons Count',

            data: {!! json_encode($districtData->values()) !!}

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

@endsection