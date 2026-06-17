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

        .logo small{
            color:#ccc;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:14px 20px;
        }

        .sidebar a:hover{
            background:#0d6efd;
        }

        .content{
            margin-left:250px;
            padding:25px;
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

    <a href="/dashboard">📊 Dashboard</a>

    <a href="/persons">📋 Persons</a>

    <a href="/persons/create">➕ Add Person</a>

    <a href="/reports">📑 Reports</a>

    @if(auth()->user()->role == 'admin')
        <a href="/users">👥 User Management</a>
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

</div>

<div class="content">

    @yield('content')

    <hr>

    <div class="text-center text-muted mt-4">

        <small>Created By</small><br>

        <strong>Tharaka Wijesinghe</strong><br>

        0761819586

    </div>

</div>

</body>
</html>