<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- TITRE POUR LE SEO -->
    <title>Laundgram - Service de lavage professionnel par Ray Ague</title>

    <!-- DESCRIPTION LONGUE POUR GOOGLE -->
    <meta name="description"
        content="Laundgram est un service de lavage professionnel, rapide et efficace, conçu pour faciliter l'entretien de vos vêtements. Développé par Ray Ague, Laundgram garantit une propreté impeccable avec un service fiable et accessible en ligne. Essayez notre service dès aujourd'hui !">

    <!-- MOTS-CLÉS POUR GOOGLE -->
    <meta name="keywords"
        content="Lavage, pressing, blanchisserie, nettoyage, vêtements, service de lavage, lavage professionnel, Ray Ague, Laundgram, lessive écologique">

    <!-- NOM DE L'AUTEUR -->
    <meta name="author" content="Ray Ague">

    <!-- GOOGLE INDEXATION -->
    <meta name="robots" content="index, follow"> <!-- Autorise Google à explorer et référencer le site -->

    <!-- OPEN GRAPH POUR FACEBOOK ET WHATSAPP -->
    <meta property="og:title" content="Laundgram - Service de lavage par Ray Ague">
    <meta property="og:description"
        content="Besoin d'un service de lavage rapide et efficace ? Laundgram, développé par Ray Ague, est la solution parfaite !">
    <meta property="og:image" content="{{ asset('images/laundgram.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- TWITTER CARD POUR LE PARTAGE SUR TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Laundgram - Lavage Professionnel">
    <meta name="twitter:description"
        content="Ray Ague présente Laundgram : un service de lavage rapide et fiable pour tous vos vêtements.">
    <meta name="twitter:image" content="{{ asset('images/laundgram.png') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/laundgram.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Autres éléments dans le head -->

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Autres liens CSS si nécessaire -->


    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="w-full overflow-x-hidden font-sans bg-gradient-to-r from-yellow-700 to-yellow-950">

    <header
        class="flex flex-row justify-between w-11/12 p-2 mx-auto mt-4 mb-10 font-extrabold rounded-md shadow-lg bg-white/10">
        {{-- <img src="{{ asset('images/laundgram.png') }}" class="w-8" alt=""> --}}
        <span class="text-2xl italic font-black text-yellow-300 "
            style="font-family: 'Dancing Script', cursive;">Laundgram</span>
        @if (Route::has('login'))
            <nav class="flex justify-end space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md bg-yellow-500  p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Tableau de bord
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md bg-yellow-500 p-2 text-black
                        ring-1 ring-transparent transition hover:text-black/70 focus:outline-none
                        focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80
                        dark:focus-visible:ring-white">
                        Connexion
                    </a>
                    {{-- <button id="login-btn" type="button"
                        class="rounded-md bg-yellow-500  p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">


                        Connexion
                    </button> --}}

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md bg-yellow-500  p-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Inscription
                        </a>
                    @endif --}}
                @endauth
            </nav>
        @endif
    </header>

    <div id="custom-toast"
        class="z-50 hidden px-4 py-3 mx-auto text-center text-white delay-75 transform rounded-lg shadow-lg cursor-pointer bg-yellow-500/50 top-20 w-10/11">
        ⚠️ Cette application est conçue uniquement pour un usage local. <br />
        📲 Pour en savoir plus ou discuter avec l'auteur, écrivez-lui directement sur
        <a href="https://wa.me/22960932967" target="_blank"
            class="font-semibold text-white underline hover:text-gray-200">
            WhatsApp
        </a> 💬.
    </div>



    <p class="my-8 text-5xl font-black text-center text-white">Découvrez les fonctionnalités de <span
            class="text-yellow-500">Laundgram</span></p>
    <div
        class="container grid flex-wrap items-center gap-2 px-2 pt-6 mx-auto mb-24 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

        <!-- Div 1: Accueil et Réception des Commandes -->
        {{-- <div class="grid items-center gap-4 mb-2 md:grid-cols-2 lg:grid-cols-4"> --}}

        <!-- Div 2: Production des Factures -->
        <div class="flex flex-col p-6 text-center rounded-lg shadow-lg items-centee bg-yellow-200/15">
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
                <i class="fas fa-tasks"></i>
            </div>
            <h2 class="mb-4 text-xl font-semibold text-yellow-500">Gestion des Commandes</h2>
            <p class="text-white">Suivez l'état de chaque commande et mettez à jour les
                informations pour un service impeccable.</p>
        </div>
        {{-- </div> --}}

        <!-- Div 5: Suivi en Temps Réel -->
        {{-- <div class="grid items-center gap-4 mx-auto my-2 md:grid-cols-2 lg:grid-cols-2"> --}}

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
            <p class="text-white">Recevez des notifications et restez
                informé des mises à jour de commande.</p>
        </div>

        <!-- Div 8: Support Client -->
        {{-- </div> --}}
    </div>

    <footer
        class="fixed bottom-0 flex justify-center w-full p-4 mx-auto mt-8 text-sm font-black text-center text-white bg-yellow-500 backdrop-blur-md brightness-90 ">
        Copyright ©&nbsp;<a class="italic text-white" href="/">Laundgram&nbsp;</a> <a
            href="https://portfolio-cnkp.vercel.app" target="_blank"> Ray
            Ague&nbsp;.&nbsp;</a> 2025

    </footer>
    <script>
        function showToast() {
            const toast = document.getElementById('custom-toast');
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 15000); // Cache le toast après 8 secondes
        }

        document.addEventListener('DOMContentLoaded', () => {
            const loginBtn = document.getElementById('login-btn');
            if (loginBtn) {
                loginBtn.addEventListener('click', (e) => {
                    showToast();
                });
            }
        });
    </script>
</body>

</html>
