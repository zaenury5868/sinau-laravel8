<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel blog | @yield('title')</title>
    @yield('styles')
</head>
<body>
    @include('layout.menu')
    @yield('body')
    @yield('scripts')
</body>
</html>
