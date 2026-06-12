<!DOCTYPE html>
<html>
<head>
    <title>Edit Person</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3>Edit Person</h3>
        </div>

        <div class="card-body">

            <form action="/persons/{{ $person->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text"
                           name="full_name"
                           class="form-control"
                           value="{{ $person->full_name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">ID Card Number</label>
                    <input type="text"
                           name="id_card_number"
                           class="form-control"
                           value="{{ $person->id_card_number }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">District</label>
                    <input type="text"
                           name="district"
                           class="form-control"
                           value="{{ $person->district }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact No 1</label>
                    <input type="text"
                           name="contact_no_1"
                           class="form-control"
                           value="{{ $person->contact_no_1 }}">
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Update Person
                </button>

                <a href="/persons"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>