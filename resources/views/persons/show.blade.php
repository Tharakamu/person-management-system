@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="card mb-3 shadow">

        <div class="card-body text-center">

            <h3 class="mb-1">
                {{ $person->full_name }}
            </h3>

            <small class="text-muted">
                Person ID : {{ $person->id }}
            </small>

        </div>

    </div>

    <h2 class="mb-4">
        Person Details
    </h2>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Full Name</th>
                    <td>{{ $person->full_name }}</td>
                </tr>
<tr>
    <th>ID Card Number</th>
    <td>{{ $person->id_card_number }}</td>
</tr>
                <tr>
                    <th>Age</th>
                    <td>{{ $person->age }}</td>
                </tr>

                <tr>
                    <th>Date Of Birth</th>
                    <td>{{ $person->date_of_birth }}</td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td>{{ $person->address }}</td>
                </tr>

                <tr>
                    <th>Contact No 1</th>
                    <td>{{ $person->contact_no_1 }}</td>
                </tr>

                <tr>
                    <th>Contact No 2</th>
                    <td>{{ $person->contact_no_2 }}</td>
                </tr>

                <tr>
                    <th>District</th>
                    <td>{{ $person->district }}</td>
                </tr>

                <tr>
                    <th>DS Division</th>
                    <td>{{ $person->ds_division }}</td>
                </tr>

                <tr>
                    <th>GN Division</th>
                    <td>{{ $person->gn_division }}</td>
                </tr>


            </table>

            <a href="{{ route('persons.index') }}"
               class="btn btn-secondary">
                Back
            </a>

            <button onclick="window.print()"
                    class="btn btn-primary">
                Print Details
            </button>

        </div>

    </div>

</div>

@endsection