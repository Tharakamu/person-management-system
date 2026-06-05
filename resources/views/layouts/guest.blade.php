<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Person Management System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        body{
            margin:0;
            font-family:'Figtree', sans-serif;
            background: linear-gradient(
    135deg,
    #dc2626,
    #991b1b
);
        }

        .glass-card{

            background: rgba(255,255,255,0.15);

            backdrop-filter: white(15px);

            -webkit-backdrop-filter: blur(15px);

            border-radius:20px;

            box-shadow:0 8px 32px rgba(0,0,0,0.25);

            padding:30px;

        }

        .system-title{

            text-align:center;
            margin-bottom:20px;

        }

        .system-title h1{

            font-size:70px;
            font-weight:900;
            color:white;
            letter-spacing:5px;
            margin:0;

        }

        .system-title h3{

            color:white;
            font-weight:bold;
            margin-top:5px;

        }

        .system-title p{

            color:white;

        }

        .footer{

            text-align:center;
            margin-top:20px;
            color:white;
            font-size:14px;

        }

    </style>

</head>

<body>

<div class="min-h-screen flex flex-col justify-center items-center">

    <div class="system-title">

        <h1>NPP</h1>

        <h3>NPP PERSON MANAGEMENT SYSTEM</h3>

        <p>
            Welcome to the Person Management System
        </p>

    </div>

    <div class="w-full sm:max-w-md glass-card">

        {{ $slot }}

    </div>

    <div class="footer">

        <strong>
            Created By Tharaka Wijesinghe
        </strong>

        <br>

        Contact : 0761819586

    </div>

</div>

</body>
</html>