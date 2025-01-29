<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="p-4 font-sans antialiased lg:p-8 md:p-6 bg-gradient-to-r from-yellow-700 to-yellow-950">

    <header class="w-full p-2 mx-auto mt-4 mb-10 font-extrabold rounded-md shadow-lg mx-auuto bg-white/10">
        @if (Route::has('login'))
            <nav class="flex justify-end space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md bg-yellow-500  p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Tableau de bord
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md bg-yellow-500  p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Connexion
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md bg-yellow-500  p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Inscription
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <p class="my-8 text-5xl font-black text-center text-white">Découvrez les fonctionnalités de <span
            class="text-yellow-500">Laundgram</span></p>
    <div class="container px-2 pt-6 mx-auto">

        <!-- Div 1: Accueil et Réception des Commandes -->
        <div class="grid gap-8 mb-2 md:grid-cols-2 lg:grid-cols-4">
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Recevoir les Commandes</h2>
                <p class="text-white">Recevez facilement les commandes via l'application, centralisez toutes les
                    demandes dans une interface intuitive.</p>
            </div>

            <!-- Div 2: Production des Factures -->
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Produire les Factures</h2>
                <p class="text-white">Générez automatiquement des factures précises pour chaque commande sans erreur,
                    avec tous les détails nécessaires.</p>
            </div>

            <!-- Div 3: Envoi des Factures via WhatsApp -->
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Envoi via WhatsApp</h2>
                <p class="text-white">Envoyez chaque facture de manière sécurisée à vos clients via WhatsApp pour un
                    règlement rapide et efficace.</p>
            </div>

            <!-- Div 4: Gestion Efficace des Commandes -->
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-list-check"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Gestion des Commandes</h2>
                <p class="text-white">Suivez l'état de chaque commande en temps réel et mettez à jour les
                    informations instantanément pour un service impeccable.</p>
            </div>
        </div>

        <!-- Div 5: Suivi en Temps Réel -->
        <div class="grid gap-8 mb-12 md:grid-cols-2 lg:grid-cols-4">
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-clock"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Suivi en Temps Réel</h2>
                <p class="text-white">Suivez en temps réel l'avancement des commandes. Restez informé et communiquez
                    avec vos clients facilement.</p>
            </div>

            <!-- Div 6: Historique des Transactions -->
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-book-open"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Historique des Transactions</h2>
                <p class="text-white">Accédez à l'historique complet de toutes vos commandes et transactions pour une
                    gestion facile et transparente.</p>
            </div>

            <!-- Div 7: Notifications et Rappels -->
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-bell"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Notifications et Rappels</h2>
                <p class="text-white">Recevez des notifications automatiques pour ne manquer aucune étape, et restez
                    informé des mises à jour de commande.</p>
            </div>

            <!-- Div 8: Support Client -->
            <div class="flex flex-col items-center p-6 text-center rounded-lg shadow-lg bg-yellow-200/15">
                <div class="mb-4 text-4xl text-yellow-500">
                    <i class="fas fa-headset"></i>
                </div>
                <h2 class="mb-4 text-xl font-semibold text-yellow-500">Support Client</h2>
                <p class="text-white">Offrez un support client intégré pour répondre aux questions et garantir une
                    expérience optimale à vos utilisateurs.</p>
            </div>
        </div>
    </div>

    <footer class="pt-4 text-sm font-black text-center text-white ">
        Copyrignt © <span class="text-yellow-500">Laundgram</span> Ray Ague.

    </footer>

</body>

</html>
