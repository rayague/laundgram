<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/laundgram.png') }}" type="image/x-icon">


    <title>Laundgram</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dashboard-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboard-assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="font-bold sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('acceuil') }}">

                <div class="mx-3 sidebar-brand-text">Laundgram</div>
            </a>

            <!-- Divider -->
            <hr class="my-0 sidebar-divider">

            <nav class="text-white bg-gray-800 sidebar">
                <!-- Nav Item - Tableau de Bord -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acceuil') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span class="font-weight-bold">TABLEAU DE BORD</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Accueil -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acceuil') }}">
                        <i class="text-white fas fa-fw fa-home"></i>
                        <span class="font-weight-bold">ACCUEIL</span>
                    </a>
                </li>

                <!-- Nav Item - Commandes -->
                <li class="bg-yellow-500 nav-item">
                    <a class="nav-link" href="{{ route('commandes') }}">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span class="font-weight-bold">COMMANDES</span>
                    </a>
                </li>

                <!-- Nav Item - Profil -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('listeCommandes') }}">
                        <i class="fas fa-fw fa-list"></i>
                        <span class="font-weight-bold">LISTE DES COMMANDES</span>
                    </a>
                </li>

                <!-- Nav Item - Profil -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('pending') }}">
                        <i class="fas fa-fw fa-clock"></i>
                        <span class="font-weight-bold">EN ATTENTE</span>
                    </a>
                </li>



                <!-- Nav Item - Profil -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('comptabilite') }}">
                        <i class="fas fa-fw fa-coins"></i>
                        <span class="font-weight-bold">COMPTABILITE</span>
                    </a>
                </li>

                <!-- Nav Item - Rappels -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('rappels') }}">
                        <i class="fas fa-fw fa-bell"></i>
                        <span class="font-weight-bold">RETRAITS</span>
                    </a>
                </li>

                <!-- Nav Item - Profil -->
                {{-- <li class="nav-item ">
                    <a class="nav-link" href="{{ route('profil') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span class="font-weight-bold">PROFIL</span>
                    </a>
                </li> --}}

                <!-- Nav Item - Déconnexion -->
                <li class="nav-item hover:bg-red-500">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="font-weight-bold">DÉCONNEXION</span>
                    </a>
                </li>
            </nav>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="border-0 rounded-circle" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h3 class="text-xl font-bold text-gray-800">Commandes </h3>
                    <!-- Topbar Navbar -->
                    <ul class="ml-auto navbar-nav">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="p-3 shadow dropdown-menu dropdown-menu-right animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="mr-auto form-inline w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="border-0 form-control bg-light small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <h3 class="nav-link dropdown-toggle">

                                <img class="img-profile rounded-circle" src="{{ asset('images/image4.jpg') }}">
                            </h3>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                <!-- Bouton pour voir la liste des commandes -->
                <div class="mt-4 ml-3">
                    <a href="
                    {{ route('listeCommandes') }}
                    "
                        class="px-6 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Voir la liste des commandes
                    </a>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="p-6 my-4 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-xl font-bold">Validation de Commande</h2>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('commandes.store') }}" method="POST" id="orderForm"
                            class="space-y-6">
                            @csrf

                            <!-- En-tête de section -->
                            <div class="pb-4 border-b border-gray-200">
                                <h2 class="text-xl font-semibold text-gray-800">Nouvelle Commande</h2>
                                <p class="mt-1 text-sm text-gray-500">Remplissez les détails de la commande</p>
                            </div>

                            <!-- Grille responsive -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <!-- Carte Client -->
                                <div class="p-4 bg-white shadow-sm rounded-xl">
                                    <h3 class="mb-4 text-lg font-medium text-gray-800">Informations Client</h3>

                                    <div class="space-y-4">
                                        <!-- Nom du client -->
                                        <div>
                                            <label class="flex items-center mb-1 text-sm font-medium text-gray-700">
                                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Nom complet
                                            </label>
                                            <input type="text" name="client"
                                                class="w-full px-4 py-2.5 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                                placeholder="Jean Dupont" required>
                                        </div>

                                        <!-- Numéro WhatsApp -->
                                        <div>
                                            <label class="flex items-center mb-1 text-sm font-medium text-gray-700">
                                                <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884" />
                                                </svg>
                                                WhatsApp
                                            </label>
                                            <input type="tel" name="numero_whatsapp"
                                                class="w-full px-4 py-2.5 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                                placeholder="97000000" pattern="[0-9]{8}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Carte Facturation -->
                                <div class="p-4 bg-white shadow-sm rounded-xl">
                                    <h3 class="mb-4 text-lg font-medium text-gray-800">Détails Facturation</h3>

                                    <div class="space-y-4">
                                        <!-- Numéro de facture -->
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">N° Facture</label>
                                            <div class="relative mt-1">
                                                <input type="text" name="numero"
                                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed"
                                                    value="{{ $numeroCommande ?? 'Généré automatiquement' }}"
                                                    readonly>
                                                <svg class="absolute w-5 h-5 text-gray-400 right-3 top-3"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dates -->
                                        <div class="grid gap-4 md:grid-cols-2">
                                            <div>
                                                <label class="text-sm font-medium text-gray-700">Dépôt</label>
                                                <input type="date" name="date_depot"
                                                    class="w-full px-4 py-2.5 mt-1 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed"
                                                    value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                                            </div>
                                            <div>
                                                <label class="text-sm font-medium text-gray-700">Retrait</label>
                                                <input type="date" name="date_retrait"
                                                    class="w-full px-4 py-2.5 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                                    min="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                                            </div>
                                        </div>

                                        <!-- Heure de retrait -->
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Heure de retrait</label>
                                            <select name="heure_retrait"
                                                class="w-full px-4 py-2.5 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all appearance-none bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cG9seWxpbmUgcG9pbnRzPSI2IDkgMTIgMTUgMTggOSI+PC9wb2x5bGluZT48L3N2Zz4=')] bg-no-repeat bg-[center_right_1rem]">
                                                @foreach (range(8, 20) as $hour)
                                                    <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00"
                                                        @if ($hour == 18) selected @endif>
                                                        {{ $hour }}:00
                                                    </option>
                                                    <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:30"
                                                        @if ($hour == 18) selected @endif>
                                                        {{ $hour }}:00
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Section Articles -->
                            <div class="p-4 bg-white shadow-sm rounded-xl">
                                <h3 class="mb-4 text-lg font-medium text-gray-800">Articles à laver</h3>

                                <div id="objets-container" class="space-y-3">
                                    <!-- Premier objet -->
                                    <div class="flex items-start gap-3" id="objets-container-0">
                                        <select name="objets[0][id]"
                                            class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                            onchange="updatePrice(this)">
                                            @foreach ($objets as $objet)
                                                <option value="{{ $objet->id }}"
                                                    data-price="{{ $objet->prix_unitaire }}">
                                                    {{ $objet->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="objets[0][prix]" value="0">
                                        <!-- Champ manquant -->

                                        <input type="number" name="objets[0][quantite]"
                                            class="w-20 px-3 py-2.5 border border-gray-300 rounded-lg text-center"
                                            placeholder="Qté" min="1" required>

                                        <input type="text" name="objets[0][description]"
                                            class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg"
                                            placeholder="Description détaillée">
                                    </div>
                                </div>

                                <button type="button"
                                    class="px-4 py-2 mt-4 font-medium text-white transition-colors bg-blue-600 rounded-lg b hover:bg-blue-700"
                                    onclick="addObjectField()">
                                    + Ajouter un article
                                </button>
                            </div>

                            <!-- Options de paiement -->
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="p-4 bg-white shadow-sm rounded-xl">
                                    <h3 class="mb-4 text-lg font-medium text-gray-800">Options de lavage</h3>

                                    <select name="type_lavage"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                        <option value="simple">Lavage simple</option>
                                        <option value="pressing">Pressing</option>
                                        <option value="lavage express">Lavage express</option>
                                        <option value="délicat">Lavage délicat</option>
                                    </select>
                                </div>

                                <div class="p-4 bg-white shadow-sm rounded-xl">
                                    <h3 class="mb-4 text-lg font-medium text-gray-800">Paiement</h3>

                                    <div class="space-y-4">
                                        <!-- Affichage du total -->
                                        <div id="total-display" class="mt-4 text-xl font-extrabold text-red-500">
                                            Total : 0 FCFA
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Avance client</label>
                                            <div class="relative mt-1">
                                                <input type="number" name="avance_client"
                                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                                    placeholder="1500.00" step="0.01">
                                                <span class="absolute text-gray-500 right-3 top-3">TND</span>
                                            </div>
                                        </div>



                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Remise</label>
                                            <select name="remise_reduction"
                                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                                <option value="0">Aucune remise</option>
                                                <option value="5">Réduction 5%</option>
                                                <option value="10">Réduction 10%</option>
                                                <option value="15">Réduction 15%</option>
                                                <option value="20">Réduction 20%</option>
                                                <option value="25">Réduction 25%</option>
                                                <option value="30">Réduction 30%</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <button type="button" id="submitButton"
                                class="w-full py-3.5 px-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition-all transform hover:scale-[1.01]">
                                Confirmer la commande
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Popup de confirmation -->
                <div id="confirmationPopup""
                    class="fixed inset-0 flex items-center justify-center hidden bg-opacity-50 bg-gray-500/50"
                    data-toggle="false">
                    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg">
                        <h3 class="mb-4 text-xl font-semibold">Êtes-vous sûr de vouloir valider cette commande ?</h3>
                        <div class="flex justify-between">
                            <button onclick="cancelOrder()"
                                class="px-4 py-2 text-gray-800 bg-gray-300 rounded-md">Annuler</button>
                            <button onclick="confirmOrder()"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md">Enregistrer</button>
                        </div>
                    </div>
                </div>



            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        Copyrignt © <span class="text-yellow-500"
                            style="font-family: 'Dancing Script', cursive;">Laundgram</span> Ray
                        Ague.
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        <!-- Modal de confirmation de déconnexion -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Prêt à quitter ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à quitter votre session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    {{-- <script>
        function updateTotalPrice() {
            let totalPrice = 0;

            document.querySelectorAll('#objets-container .flex').forEach(row => {
                const select = row.querySelector('select');
                const quantity = row.querySelector('input[type="number"]');
                const priceInput = row.querySelector('input[type="hidden"]');

                const unitPrice = parseFloat(select.options[select.selectedIndex].dataset.price);
                const qty = parseInt(quantity.value) || 1;

                const itemTotal = unitPrice * qty;
                priceInput.value = itemTotal.toFixed(2); // Stocke le prix dans le champ caché

                totalPrice += itemTotal;
            });

            // Met à jour l'affichage
            document.getElementById('total-display').textContent = `Total : ${totalPrice.toFixed(2)} FCFA`;
            document.querySelector('input[name="avance_client"]').value = totalPrice.toFixed(2);
        }

        // Écouteurs d'événements
        document.addEventListener('input', function(e) {
            if (e.target.matches('select, input[type="number"]')) {
                updateTotalPrice();
            }
        });

        // Fonction pour ajouter des articles (à compléter)
        let itemCount = 1;

        function addObjectField() {
            const newItem = document.querySelector('#objets-container-0').cloneNode(true);
            newItem.id = `objets-container-${itemCount}`;

            // Met à jour les names
            newItem.querySelector('select').name = `objets[${itemCount}][id]`;
            newItem.querySelector('input[type="number"]').name = `objets[${itemCount}][quantite]`;
            newItem.querySelector('input[type="hidden"]').name = `objets[${itemCount}][prix]`;
            newItem.querySelector('input[type="text"]').name = `objets[${itemCount}][description]`;

            document.getElementById('objets-container').appendChild(newItem);
            itemCount++;
        }

        // Initialisation
        updateTotalPrice();
    </script> --}}

    <script>
        // Récupération du HTML des options (Blade l'a déjà rendu correctement)
        const objetOptionsHTML = document.querySelector('select[name="objets[0][id]"]').innerHTML;

        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll('#objets-container .flex').forEach(row => {
                const select = row.querySelector('select');
                const qtyInput = row.querySelector('input[type="number"]');
                const prixHidden = row.querySelector('input[type="hidden"][name*="[prix]"]');

                const unitPrice = parseFloat(select.selectedOptions[0].dataset.price) || 0;
                const qty = parseInt(qtyInput.value) || 1;
                const lineTotal = unitPrice * qty;

                prixHidden.value = lineTotal.toFixed(2);
                total += lineTotal;
            });

            document.getElementById('total-display').textContent =
                `Total : ${total.toFixed(2)} TND`;
        }

        function addObjectField() {
            const container = document.getElementById('objets-container');
            const index = container.children.length;
            const wrapper = document.createElement('div');
            wrapper.className = 'flex gap-4 mb-2';

            wrapper.innerHTML = `
            <select name="objets[${index}][id]" class="flex-1 px-4 py-2.5 border rounded-lg" required>
              ${objetOptionsHTML}
            </select>
            <input type="hidden" name="objets[${index}][prix]" value="0">
            <input type="number" name="objets[${index}][quantite]"
                   class="w-20 px-3 py-2.5 border rounded-lg text-center"
                   value="1" min="1" required>
            <input type="text" name="objets[${index}][description]"
                   class="flex-1 px-4 py-2.5 border rounded-lg"
                   placeholder="Description détaillée">
            <button type="button" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">
              Supprimer
            </button>
          `;

            container.appendChild(wrapper);
            updateTotalPrice();
        }

        // Écouteurs unifiés (input pour quantité, change pour select, click pour supprimer)
        const cont = document.getElementById('objets-container');
        cont.addEventListener('input', e => {
            if (e.target.matches('input[type="number"][name*="[quantite]"]')) {
                updateTotalPrice();
            }
        });
        cont.addEventListener('change', e => {
            if (e.target.matches('select[name*="[id]"]')) {
                updateTotalPrice();
            }
        });
        cont.addEventListener('click', e => {
            if (e.target.tagName === 'BUTTON') {
                e.target.closest('.flex').remove();
                updateTotalPrice();
            }
        });

        // Initialisation
        document.addEventListener('DOMContentLoaded', updateTotalPrice);
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1) Récupère le container et le select initial
            const container = document.getElementById('objets-container');
            const originalSelect = container.querySelector('select[name="objets[0][id]"]');
            if (!originalSelect) {
                console.error('Select initial introuvable');
                return;
            }
            const optionsHTML = originalSelect.innerHTML;

            // 2) Calcul du total
            function updateTotalPrice() {
                let total = 0;
                container.querySelectorAll('.flex').forEach(row => {
                    const select = row.querySelector('select');
                    const qtyInput = row.querySelector('input[type="number"]');
                    const prixHidden = row.querySelector('input[type="hidden"][name*="[prix]"]');
                    const unitPrice = parseFloat(select.selectedOptions[0].dataset.price) || 0;
                    const qty = parseInt(qtyInput.value, 10) || 1;
                    const lineTotal = unitPrice * qty;
                    prixHidden.value = lineTotal.toFixed(2);
                    total += lineTotal;
                });
                document.getElementById('total-display').textContent =
                    `Total : ${total.toFixed(2)} TND`;
            }

            // 3) Ajout d'une nouvelle ligne
            function addObjectField() {
                const index = container.children.length;
                const wrapper = document.createElement('div');
                wrapper.className = 'flex gap-4 mb-2';
                wrapper.innerHTML = `
          <select name="objets[${index}][id]" class="flex-1 px-4 py-2.5 border rounded-lg" required>
            ${optionsHTML}
          </select>
          <input type="hidden" name="objets[${index}][prix]" value="0">
          <input type="number" name="objets[${index}][quantite]" class="w-20 px-3 py-2.5 border rounded-lg text-center" value="1" min="1" required>
          <input type="text" name="objets[${index}][description]" class="flex-1 px-4 py-2.5 border rounded-lg" placeholder="Description détaillée">
          <button type="button" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Supprimer</button>
        `;
                container.appendChild(wrapper);
                updateTotalPrice();
            }

            // 4) Déléguation des événements
            container.addEventListener('input', e => e.target.matches('input[type="number"]') &&
        updateTotalPrice());
            container.addEventListener('change', e => e.target.matches('select[name*="[id]"]') &&
            updateTotalPrice());
            container.addEventListener('click', e => {
                if (e.target.tagName === 'BUTTON') {
                    e.target.closest('.flex').remove();
                    updateTotalPrice();
                }
            });

            // 5) Lien avec le bouton « + Ajouter un article »
            const addBtn = document.getElementById('add-object-btn');
            if (addBtn) addBtn.addEventListener('click', addObjectField);
            else console.error('Bouton + Ajouter un article introuvable');

            // 6) Init
            updateTotalPrice();
        });
    </script>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('orderForm');
            const submitButton = document.getElementById('submitButton');
            const requiredFields = form.querySelectorAll('[required]');

            // Fonction de vérification globale
            function checkFormValidity() {
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim() ||
                        (field.type === 'number' && field.value < 1) ||
                        (field.tagName === 'SELECT' && field.value === '')) {
                        isValid = false;
                    }
                });

                // Vérification supplémentaire pour les articles dynamiques
                const quantityInputs = document.querySelectorAll('input[name^="objets["][name$="[quantite]"]');
                quantityInputs.forEach(input => {
                    if (input.value < 1) isValid = false;
                });

                submitButton.style.display = isValid ? 'block' : 'none';
            }

            // Écouteurs d'événements
            requiredFields.forEach(field => {
                field.addEventListener('input', checkFormValidity);
                field.addEventListener('change', checkFormValidity);
            });

            // Vérification initiale
            checkFormValidity();
        });

        // Modification des fonctions dynamiques pour déclencher la vérification
        // function addObjectField() {
        //     // ... votre code existant ...
        //     checkFormValidity(); // Ajouter cette ligne à la fin
        // }

        function removeObjectField(button) {
            // ... votre code existant ...
            checkFormValidity(); // Ajouter cette ligne à la fin
        }
    </script>

    <!-- Modifiez le bouton de soumission comme suit -->
    {{-- <button type="submit" id="submitButton"
                class="w-full py-3.5 px-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-sm transition-all transform hover:scale-[1.01] hidden">
            Confirmer la commande
        </button> --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboard-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboard-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard-assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dashboard-assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dashboard-assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
