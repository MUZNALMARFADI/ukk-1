<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0a1b3d] min-h-screen flex items-center justify-center">

    <!-- Container Form -->
    <div class="w-full max-w-md p-6">
        {{ $slot }}
    </div>

</body>
</html>
