<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="flex flex-col justify-center items-center">
        <h2>Welcome to Laravel Server</h2>
        <nav class="flex">
            <a href="{{url('/')}}">Home</a>
            <a href="{{route('about')}}">About</a>
            <a href="{{route('admin')}}">Admin</a>
            <a href="{{url('/dashboard')}}">Dashboard</a>
            <a href="{{url('/login')}}">Login</a>
            <a href="{{url('/register')}}">Register</a>
        </nav>
    </div>
</body>

</html>
