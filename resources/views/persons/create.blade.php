<!DOCTYPE html>
<html>
<head>
    <title>Add New Person</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Add New Person</h3>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif

            <form method="POST" action="/persons">

                @csrf

                @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Please fix the following errors:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

                @endif

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text"
                           name="full_name"
                           class="form-control"
                           value="{{ old('full_name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number"
                           name="age"
                           class="form-control"
                           value="{{ old('age') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date"
                           name="date_of_birth"
                           class="form-control"
                           value="{{ old('date_of_birth') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address"
                              class="form-control">{{ old('address') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact No 1</label>
                    <input type="text"
                           name="contact_no_1"
                           class="form-control"
                           value="{{ old('contact_no_1') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact No 2</label>
                    <input type="text"
                           name="contact_no_2"
                           class="form-control"
                           value="{{ old('contact_no_2') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">District</label>
                    <input type="text"
                           name="district"
                           class="form-control"
                           placeholder="Enter District"
                           value="{{ old('district') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">DS Division</label>
                    <input type="text"
                           name="ds_division"
                           class="form-control"
                           placeholder="Enter DS Division"
                           value="{{ old('ds_division') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">GN Division</label>
                    <input type="text"
                           name="gn_division"
                           class="form-control"
                           placeholder="Enter GN Division"
                           value="{{ old('gn_division') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">GS Wasam</label>
                    <input type="text"
                           name="gs_wasam"
                           class="form-control"
                           placeholder="Enter GS Wasam"
                           value="{{ old('gs_wasam') }}">
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Save Person
                </button>

                <a href="/persons"
                   class="btn btn-secondary">
                    Back to List
                </a>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>