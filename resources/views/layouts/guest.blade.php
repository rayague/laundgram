<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laundgram') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/laundgram.png') }}" type="image/x-icon">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/image2.jpg') }}" type="image/x-icon">


    <!-- Autres éléments dans le head -->

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Autres liens CSS si nécessaire -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-gradient-to-r from-yellow-700 to-yellow-950">
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">

        <div
            class="w-full px-6 py-4 mt-6 overflow-hidden font-bold shadow-lg sm:max-w-md sm:rounded-lg bg-yellow-200/15">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
