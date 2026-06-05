<!DOCTYPE html>
<html>
<head>

    <title>People Summary Report</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        table,
        th,
        td{
            border:1px solid #000;
        }

        th,
        td{
            padding:6px;
            text-align:left;
        }

        h2{
            text-align:center;
            margin-bottom:10px;
        }

        h3{
            margin-top:20px;
        }

    </style>

</head>
<body>

    <h2>
        People Summary Report

        @if(!empty($district))
            - {{ ucfirst($district) }}
        @endif
    </h2>

    <p>
        <strong>Report Date :</strong>
        {{ date('Y-m-d H:i:s') }}
    </p>

    <hr>

    <!-- SUMMARY -->

    <h3>Summary Information</h3>

    <table>

        <tr>
            <td><strong>Total Persons</strong></td>
            <td>{{ $totalPeople }}</td>
        </tr>

        <tr>
            <td><strong>Total Users</strong></td>
            <td>{{ $userCount }}</td>
        </tr>

    </table>

    <!-- DISTRICT COUNTS -->

    <h3>District Wise Counts</h3>

    <table>

        <thead>

            <tr>
                <th>District</th>
                <th>Total</th>
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

    <!-- PERSON DETAILS -->

    <h3>Person Details</h3>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>District</th>
                <th>DS Division</th>
                <th>GN Division</th>
                <th>Phone</th>
            </tr>

        </thead>

        <tbody>

        @foreach($people as $person)

            <tr>
                <td>{{ $person->id }}</td>
                <td>{{ $person->full_name }}</td>
                <td>{{ $person->district }}</td>
                <td>{{ $person->ds_division }}</td>
                <td>{{ $person->gn_division }}</td>
                <td>{{ $person->contact_no_1 }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>

</body>
</html>