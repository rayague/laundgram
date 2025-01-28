<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laundgram</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

<body class="relative items-center justify-center font-sans antialiased bg-gradient-to-l from-slate-500 to-slate-800">

    <header class="grid items-center grid-cols-1 gap-2 py-4 shadow-lg bg-yellow-100/20 lg:grid-cols-3">
        @if (Route::has('login'))
            <nav class="flex flex-row w-full gap-4 pl-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md bg-yellow-500 font-bold p-2 text-black bg-slate-200 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Tableau de Board
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md bg-yellow-500 font-bold p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Se connecter
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md bg-yellow-500 font-bold p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            S'inscrire
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>



    <footer class="fixed w-full text-sm font-bold text-center text-white bottom-2">
        © copyright. Ray Ague <span class="font-black text-yellow-500 ">Laundgram</span> Tout droits
        réservé.
    </footer>
</body>

</html>
