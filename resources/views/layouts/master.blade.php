<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <header>
        @include('layouts/header')
    </header>
    <div class="w3-container" style="width:500px;margin:auto;margin-top:20px;">
        @yield('content')
    </div>
    @yield('script')
</body>
</html>