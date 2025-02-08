<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ESTATE- @yield('title')</title>
</head>

<body>
    <header>
        @include('shared.header')
    </header>
    <main class="min-h-screen">
        @yield('content')
    </main>
    <footer>
        @include('shared.footer')
    </footer>
</body>

</html>