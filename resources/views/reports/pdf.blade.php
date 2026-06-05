<!DOCTYPE html>
<html>
<head>
    <title>Summary Report</title>

    <style>

        body{
            font-family: DejaVu Sans;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

        h2{
            text-align:center;
        }

    </style>
</head>
<body>

    <h2>System Summary Report</h2>

    <p>
        <strong>Total Persons :</strong>
        {{ $totalPersons }}
    </p>

    <p>
        <strong>Total Users :</strong>
        {{ $totalUsers }}
    </p>

    <table>

        <thead>
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

</body>
</html>