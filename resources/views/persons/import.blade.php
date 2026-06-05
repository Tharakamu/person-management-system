<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Import Excel File</h3>
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('persons.import') }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Select Excel File
                    </label>

                    <input type="file"
                           name="excel_file"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success">
                    Import Excel
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