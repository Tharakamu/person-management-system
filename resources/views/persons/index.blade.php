
@extends('layouts.admin')

@section('content')

<div class="container mt-4">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<h2 class="text-center mb-4">
    People Management System
</h2>

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card text-center bg-primary text-white shadow">
            <div class="card-body">
                <h5>Total People</h5>
                <h2>{{ $totalPeople }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center bg-success text-white shadow">
            <div class="card-body">
                <h5>Kalutara</h5>
                <h2>{{ $kalutaraCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center bg-danger text-white shadow">
            <div class="card-body">
                <h5>Colombo</h5>
                <h2>{{ $colomboCount }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card p-3 mb-3 shadow">

    <form method="GET" action="{{ route('persons.index') }}">

        <div class="row g-2">

            <div class="col-md-3">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search Name / NIC"
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <input type="text"
                       name="district"
                       class="form-control"
                       placeholder="District"
                       value="{{ request('district') }}">
            </div>

            <div class="col-md-2">
                <input type="text"
                       name="ds_division"
                       class="form-control"
                       placeholder="DS Division"
                       value="{{ request('ds_division') }}">
            </div>

            <div class="col-md-2">
                <input type="text"
                       name="gn_division"
                       class="form-control"
                       placeholder="GN Division"
                       value="{{ request('gn_division') }}">
            </div>

            <div class="col-md-1">
                <button class="btn btn-primary w-100">
                    Search
                </button>
            </div>
<div class="col-md-2">
    <select name="gender" class="form-select">
        <option value="">Gender</option>

        <option value="Male"
            {{ request('gender') == 'Male' ? 'selected' : '' }}>
            Male
        </option>

        <option value="Female"
            {{ request('gender') == 'Female' ? 'selected' : '' }}>
            Female
        </option>
    </select>
</div>

<div class="col-md-1">
    <input type="number"
           name="min_age"
           class="form-control"
           placeholder="Min"
           value="{{ request('min_age') }}">
</div>

<div class="col-md-1">
    <input type="number"
           name="max_age"
           class="form-control"
           placeholder="Max"
           value="{{ request('max_age') }}">
</div>
            <div class="col-md-2">
                <a href="{{ route('persons.index') }}"
                   class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>

        </div>

    </form>

</div>

<div class="mb-3 d-flex gap-2 flex-wrap">

    <a href="{{ route('dashboard') }}"
       class="btn btn-dark">
        🏠 Dashboard
    </a>

    <a href="{{ route('persons.create') }}"
       class="btn btn-success">
        ➕ Add New Person
    </a>

    <a href="{{ route('persons.export') }}"
       class="btn btn-primary">
        📊 Export Excel
    </a>

    <a href="{{ route('persons.import.form') }}"
       class="btn btn-warning">
        📥 Import Excel
    </a>

</div>

<form action="{{ route('persons.pdf') }}"
      method="GET"
      class="mb-3">

    <div class="d-flex gap-2">

        <select name="district"
                class="form-select w-auto">

            <option value="">All Districts</option>
            <option value="kaluthara">Kalutara</option>
            <option value="colombo">Colombo</option>
            <option value="gampaha">Gampaha</option>

        </select>

        <button type="submit"
                class="btn btn-danger">
            📄 Export PDF
        </button>

    </div>

</form>

<table class="table table-bordered table-striped table-hover">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>NIC</th>
            <th>District</th>
            <th>DS Division</th>
            <th>GN Division</th>
            <th>Phone</th>

            @if(auth()->user()->role == 'admin')
                <th>Edit</th>
                <th>Delete</th>
            @endif

        </tr>

    </thead>

    <tbody>

    @forelse($people as $person)

        <tr>

            <td>{{ $person->id }}</td>

            <td>
                <a href="{{ route('persons.show', $person->id) }}">
                    {{ $person->full_name }}
                </a>
            </td>

            <td>{{ $person->id_card_number }}</td>
            <td>{{ $person->district }}</td>
            <td>{{ $person->ds_division }}</td>
            <td>{{ $person->gn_division }}</td>
            <td>{{ $person->contact_no_1 }}</td>

            @if(auth()->user()->role == 'admin')

            <td>
                <a href="{{ route('persons.edit', $person->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>
            </td>

            <td>
                <form action="{{ route('persons.destroy', $person->id) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>

                </form>
            </td>

            @endif

        </tr>

    @empty

        <tr>

            <td colspan="{{ auth()->user()->role == 'admin' ? 9 : 7 }}"
                class="text-center">

                No Records Found

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div class="mt-3">
    {{ $people->links() }}
</div>

</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

