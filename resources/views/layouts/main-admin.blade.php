<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel-rental-car</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.subviews.bar-admin')
    <main class="bg-white dark:bg-gray-900 min-h-screen p-4 sm:ml-64">
        @yield('content')
    </main>
</body>

</html>