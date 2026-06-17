
<!DOCTYPE html>
<html>
<head>
    <title>Edit Person</title>

    @extends('layouts.admin')

@section('content')
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3>Edit Person</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('persons.update', $person->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text"
                           name="full_name"
                           class="form-control"
                           value="{{ old('full_name', $person->full_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        ID Card Number
                    </label>
                    <input type="text"
                           name="id_card_number"
                           id="nic"
                           class="form-control"
                           value="{{ old('id_card_number', $person->id_card_number) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number"
                           name="age"
                           id="age"
                           class="form-control"
                           value="{{ old('age', $person->age) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date"
                           name="date_of_birth"
                           id="dob"
                           class="form-control"
                           value="{{ old('date_of_birth', $person->date_of_birth) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text"
                           name="gender"
                           id="gender"
                           class="form-control"
                           value="{{ old('gender', $person->gender) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address"
                              class="form-control">{{ old('address', $person->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact No 1</label>
                    <input type="text"
                           name="contact_no_1"
                           class="form-control"
                           value="{{ old('contact_no_1', $person->contact_no_1) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact No 2</label>
                    <input type="text"
                           name="contact_no_2"
                           class="form-control"
                           value="{{ old('contact_no_2', $person->contact_no_2) }}">
                </div>

          <div class="mb-3">
    <label class="form-label">District</label>

    <select name="district" class="form-select">

        <option value="Colombo"
            {{ old('district', $person->district) == 'Colombo' ? 'selected' : '' }}>
            Colombo
        </option>

        <option value="Gampaha"
            {{ old('district', $person->district) == 'Gampaha' ? 'selected' : '' }}>
            Gampaha
        </option>

        <option value="Kalutara"
            {{ old('district', $person->district) == 'Kalutara' ? 'selected' : '' }}>
            Kalutara
        </option>

    </select>
</div>

                <div class="mb-3">
                    <label class="form-label">DS Division</label>
                    <input type="text"
                           name="ds_division"
                           class="form-control"
                           value="{{ old('ds_division', $person->ds_division) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">GN Division</label>
                    <input type="text"
                           name="gn_division"
                           class="form-control"
                           value="{{ old('gn_division', $person->gn_division) }}">
                </div>

                <button type="submit" class="btn btn-success">
                    Update Person
                </button>

                <a href="/persons" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

