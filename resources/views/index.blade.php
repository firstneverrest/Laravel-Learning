<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/global.css') }}">
</head>

<body class="antialiased">
    <div class="flex flex-col justify-center items-center">
        <h2>Welcome to Laravel Server</h2>
        <a href="{{url('/')}}">Home</a>
        <a href="{{route('about')}}">About</a>
    </div>
</body>

</html>
