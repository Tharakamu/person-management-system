@extends('layouts.admin')

@section('content')

<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">

   <div>
    <h1 class="fw-bold text-primary mb-0">
        PERSON MANAGEMENT SYSTEM
    </h1>

    <p class="text-success fs-5 mb-1">
        Administration Dashboard
    </p>

    <small class="text-muted">
        Logged in as : {{ auth()->user()->name }}
    </small>
</div>
</div>

<!-- Summary Cards -->

<div class="row mb-4">

    <div class="col">
        <div class="card bg-primary text-white shadow">
            <div class="card-body text-center">
                <h6>Total Persons</h6>
                <h2>{{ $personCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card bg-success text-white shadow">
            <div class="card-body text-center">
                <h6>Total Users</h6>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card bg-info text-white shadow">
            <div class="card-body text-center">
                <h6>Male</h6>
                <h2>{{ $maleCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card bg-danger text-white shadow">
            <div class="card-body text-center">
                <h6>Female</h6>
                <h2>{{ $femaleCount }}</h2>
            </div>
        </div>
    </div>
<div class="col">
    <div class="card bg-dark text-white shadow">
        <div class="card-body text-center">
            <h6>Under 18</h6>
            <h2>{{ $under18Count }}</h2>
        </div>
    </div>
</div>

<div class="col">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body text-center">
            <h6>Over 18</h6>
            <h2>{{ $over18Count }}</h2>
        </div>
    </div>
</div>
    <div class="col">
        <div class="card bg-warning text-dark shadow">
            <div class="card-body text-center">
                <h6>Today</h6>
                <h2>{{ $todayRegistrations }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- Buttons -->

<div class="mb-4">

    <a href="/persons/create" class="btn btn-primary">
        Add New Person
    </a>

    <a href="/persons" class="btn btn-secondary">
        View Persons
    </a>

    @if(auth()->user()->role == 'admin')
        <a href="/users" class="btn btn-warning">
            User Management
        </a>
    @endif

    <a href="/reports" class="btn btn-info">
        Reports
    </a>

</div>

<!-- Charts Row -->

<div class="row">

    <!-- District Chart -->

    <div class="col-md-4">

        <div class="card shadow mb-4">

            <div class="card-header bg-dark text-white">
                District Statistics
            </div>

            <div class="card-body">

                <div style="height:250px;">
                    <canvas id="districtChart"></canvas>
                </div>

            </div>

        </div>

    </div>

    <!-- Gender Chart -->

    <div class="col-md-4">

        <div class="card shadow mb-4">

            <div class="card-header bg-secondary text-white">
                Gender Distribution
            </div>

            <div class="card-body">

                <div style="height:250px;">
                    <canvas id="genderChart"></canvas>
                </div>

            </div>

        </div>

    </div>

    <!-- Age Chart -->

    <div class="col-md-4">

        <div class="card shadow mb-4">

            <div class="card-header bg-success text-white">
                Age Group Statistics
            </div>

            <div class="card-body">

                <div style="height:250px;">
                    <canvas id="ageChart"></canvas>
                </div>

            </div>

        </div>

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

// District Chart

new Chart(document.getElementById('districtChart'), {

    type: 'bar',

    data: {

        labels: {!! json_encode($districtData->keys()) !!},

        datasets: [{

            label: 'Persons',

            data: {!! json_encode($districtData->values()) !!},

            backgroundColor: '#0d6efd'

        }]

    },

    options: {

        maintainAspectRatio: false,

        responsive: true

    }

});

// Gender Chart

new Chart(document.getElementById('genderChart'), {

    type: 'pie',

    data: {

        labels: ['Male','Female'],

        datasets: [{

            data: [
                {{ $maleCount }},
                {{ $femaleCount }}
            ]

        }]

    },

    options: {

        maintainAspectRatio: false,

        responsive: true

    }

});

// Age Chart

new Chart(document.getElementById('ageChart'), {

    type: 'doughnut',

    data: {

       labels: [
    'Under 18',
    '18-35',
    '36-60',
    '60+'
],

        datasets: [{

            data: [
    {{ $under18Count }},
    {{ $youngCount }},
    {{ $middleCount }},
    {{ $seniorCount }}
]

        }]

    },

    options: {

        maintainAspectRatio: false,

        responsive: true

    }

});

</script>

@endsection
