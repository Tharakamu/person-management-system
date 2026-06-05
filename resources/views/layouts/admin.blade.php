<!DOCTYPE html>
<html>
<head>
    <title>Person Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            background:#f4f6f9;
            overflow-x:hidden;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#212529;
            position:fixed;
            color:white;
        }

        .logo{
            text-align:center;
            padding:20px;
            border-bottom:1px solid #444;
        }

        .logo h4{
            margin:0;
        }

        .logo small{
            color:#ccc;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:14px 20px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#0d6efd;
        }

        .content{
            margin-left:250px;
            padding:25px;
        }

        .footer{
            position:absolute;
            bottom:10px;
            width:100%;
            text-align:center;
            font-size:12px;
            color:#ccc;
        }

    </style>

</head>
<body>

<div class="sidebar">

    <div class="logo">

        <h4>Person Management</h4>

        <small>
            {{ auth()->user()->name }}
        </small>

    </div>

    <a href="/dashboard">
        📊 Dashboard
    </a>

    <a href="/persons">
        📋 Persons
    </a>

    <a href="/persons/create">
        ➕ Add Person
    </a>

    <a href="/reports">
        📑 Reports
    </a>

    @if(auth()->user()->role == 'admin')

        <a href="/users">
            👥 User Management
        </a>

    @endif

    <hr>

    <form method="POST"
          action="{{ route('logout') }}"
          class="px-3">

        @csrf

        <button class="btn btn-danger w-100">
            Logout
        </button>

    </form>

    <div class="footer">

        Created By<br>
        <strong>Tharaka Wijesinghe</strong><br>
        0761819586

    </div>

</div>

<div class="content">

    @yield('content')

</div>

</body>
</html>