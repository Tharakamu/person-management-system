<!DOCTYPE html>
<html>
<head>
    <title>Summary Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">System Summary Report</h2>

    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h5>Total Persons</h5>
                    <h2>{{ $totalPersons }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h5>Total Users</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

    </div>

    <h3>District Wise Report</h3>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>District</th>
                <th>Total Persons</th>
            </tr>
        </thead>

        <tbody>

        @foreach($districtCounts as $row)

            <tr>
                <td>{{ $row->district }}</td>
                <td>{{ $row->total }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>

    <hr>

    <h3 class="mt-4">
        DS Division Wise Report
    </h3>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>District</th>
                <th>DS Division</th>
                <th>Total Persons</th>
            </tr>
        </thead>

        <tbody>

        @foreach($dsCounts as $row)

            <tr>
                <td>{{ $row->district }}</td>
                <td>{{ $row->ds_division }}</td>
                <td>{{ $row->total }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>

    <a href="{{ route('reports.pdf') }}"
       class="btn btn-danger">
        Download PDF
    </a>

</div>

</body>
</html>