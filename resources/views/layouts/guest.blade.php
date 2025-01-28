<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative flex flex-col items-center justify-center min-h-screen font-sans antialiased text-gray-900">
    <img src="{{ asset('/images/image4.jpg') }}" class="fixed top-0 bottom-0 left-0 w-full h-screen -z-10"
        alt="">
    {{-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0"> --}}

    <div
        class="absolute z-10 w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-lg shadow-slate-950 sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
    {{-- </div> --}}
</body>

</html>
