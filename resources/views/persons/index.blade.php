<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

<h2 class="text-center mb-4">
    People Management System
</h2>

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card text-center bg-primary text-white">
            <div class="card-body">
                <h5>Total People</h5>
                <h2>{{ $totalPeople }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center bg-success text-white">
            <div class="card-body">
                <h5>Kalutara</h5>
                <h2>{{ $kalutaraCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center bg-danger text-white">
            <div class="card-body">
                <h5>Colombo</h5>
                <h2>{{ $colomboCount }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- Search & Filter -->

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
                <a href="{{ route('persons.index') }}"
                   class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>

        </div>

    </form>

</div>

<!-- Buttons -->

<a href="/persons/create"
   class="btn btn-success mb-3">
    + Add New Person
</a>

<a href="{{ route('persons.export') }}"
   class="btn btn-primary mb-3">
    Export Excel
</a>

<form action="{{ route('persons.pdf') }}"
      method="GET"
      class="d-inline">

    <select name="district"
            class="form-select d-inline w-auto">

        <option value="">All Districts</option>
        <option value="kaluthara">Kalutara</option>
        <option value="colombo">Colombo</option>
        <option value="gampaha">Gampaha</option>

    </select>

    <button type="submit"
            class="btn btn-danger">
        Export PDF
    </button>

</form>

<a href="{{ route('persons.import.form') }}"
   class="btn btn-warning mb-3">
    Import Excel
</a>

<!-- Table -->

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Name</th>
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
            <td>{{ $person->district }}</td>
            <td>{{ $person->ds_division }}</td>
            <td>{{ $person->gn_division }}</td>
            <td>{{ $person->contact_no_1 }}</td>

            @if(auth()->user()->role == 'admin')

                <td>
                    <a href="/persons/{{ $person->id }}/edit"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>
                </td>

                <td>
                    <form action="/persons/{{ $person->id }}"
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

            <td colspan="{{ auth()->user()->role == 'admin' ? 8 : 6 }}"
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