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
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('profil') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span class="font-weight-bold">PROFIL</span>
                    </a>
                </li>

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

                        <form action="{{ route('commandes.store') }}" method="POST" id="orderForm">
                            @csrf

                            <!-- Nom du client -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nom du client</label>
                                <input type="text" name="client"
                                    class="w-full p-2 mt-1 border rounded-md @error('client') border-red-500 @enderror"
                                    placeholder="Entrez le nom" required>
                                @error('client')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Numéro WhatsApp -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Numéro WhatsApp</label>
                                <input type="text" name="numero_whatsapp"
                                    class="w-full p-2 mt-1 border rounded-md" placeholder="Ex: 97000000" required>
                            </div>

                            <!-- Numéro de facture -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Numéro de facture</label>
                                <input type="text" name="numero"
                                    class="w-full p-2 mt-1 bg-gray-200 border rounded-md"
                                    value="{{ $numeroCommande ?? 'Généré automatiquement' }}" readonly>
                            </div>

                            <!-- Date de dépôt -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Date de dépôt</label>
                                <input type="date" name="date_depot" class="w-full p-2 mt-1 border rounded-md"
                                    value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                            </div>

                            <!-- Date et Heure de retrait -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Date de retrait</label>
                                    <input type="date" name="date_retrait"
                                        class="w-full p-2 mt-1 border rounded-md" required
                                        min="{{ \Carbon\Carbon::now()->toDateString() }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Heure de retrait</label>
                                    <select name="heure_retrait" class="w-full p-2 mt-1 border rounded-md" required>
                                        @foreach (range(8, 20) as $hour)
                                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00">
                                                {{ $hour }}:00</option>
                                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:30">
                                                {{ $hour }}:30</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Objets à laver -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Objets</label>
                                <div id="objets-container">
                                    <!-- Premier objet initial -->
                                    <div class="flex gap-4 mb-2" id="objets-container-0">
                                        <select name="objets[0][id]" class="w-full p-2 mt-1 border rounded-md"
                                            required onchange="updatePrice(this)">
                                            @foreach ($objets as $objet)
                                                <option value="{{ $objet->id }}"
                                                    data-price="{{ $objet->prix_unitaire }}">{{ $objet->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="objets[0][quantite]"
                                            class="w-20 p-2 mt-1 border rounded-md" placeholder="Qté" min="1"
                                            required>
                                        <input type="text" name="objets[0][description]"
                                            class="w-full p-2 mt-1 border rounded-md" placeholder="Description"
                                            required>
                                        <!-- Correction ici: index fixe pour le premier élément -->
                                        <input type="hidden" name="objets[0][prix]"
                                            value="{{ $objets[0]->prix }}" />
                                        <!-- Bouton pour supprimer cet objet -->
                                        {{-- <button type="button"
                                            class="px-2 py-1 text-white bg-red-500 rounded h:bg-red-600"
                                            onclick="removeObjectField(this)">Supprimer</button> --}}
                                    </div>
                                </div>
                                <button type="button" class="mt-2 text-blue-500" onclick="addObjectField()">Ajouter
                                    un objet</button>
                            </div>

                            <!-- Type de lavage -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Type de lavage</label>
                                <select name="type_lavage" id="type_lavage" class="w-full p-2 mt-1 border rounded-md"
                                    required>
                                    <option>Lavage simple</option>
                                    <option>Pressing</option>
                                    <option>Lavage express</option>
                                    <option>Lavage délicat</option>
                                </select>
                            </div>

                            <!-- Avance client -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Avance client</label>
                                <input type="number" name="avance_client" id="avance_client"
                                    class="w-full p-2 mt-1 border rounded-md" placeholder="Ex: 1500.00"
                                    step="0.01" required>
                            </div>

                            <!-- Remises et Réductions -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Remise ou Réduction</label>
                                <select name="remise_reduction" id="remise_reduction"
                                    class="w-full p-2 mt-1 border rounded-md">
                                    <option value="0">Aucune remise</option>
                                    <option value="10">Réduction 10%</option>
                                    <option value="15">Réduction 15%</option>
                                    <option value="20">Réduction 20%</option>
                                    <option value="25">Réduction 25%</option>
                                    <option value="30">Réduction 30%</option>
                                    <option value="35">Réduction 35%</option>
                                    <option value="40">Réduction 40%</option>
                                    <option value="45">Réduction 45%</option>
                                    <option value="50">Réduction 50%</option>
                                </select>
                            </div>

                            <!-- Statut de la commande (non retirée par défaut) -->
                            <input type="hidden" name="statut" value="Non retirée">

                            <button type="button" id="submitButton"
                                class="w-full p-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                Valider la commande
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



    <script>
        // Fonction pour ajouter un objet
        function addObjectField() {
            const container = document.getElementById('objets-container');
            const index = container.children.length;
            const template = `
            <div class="flex gap-4 mb-2" id="objets-container-${index}">
                <select name="objets[${index}][id]" class="w-full p-2 mt-1 border rounded-md" required onchange="updatePrice(this)">
                    @foreach ($objets as $objet)
                        <option value="{{ $objet->id }}" data-price="{{ $objet->prix }}">{{ $objet->nom }}</option>
                    @endforeach
                </select>
                <input type="number" name="objets[${index}][quantite]" class="w-20 p-2 mt-1 border rounded-md" placeholder="Qté" min="1" required>
                <input type="text" name="objets[${index}][description]" class="w-full p-2 mt-1 border rounded-md" placeholder="Description" required>
                <input type="hidden" name="objets[${index}][prix]" value="" />
                <!-- Bouton pour supprimer cet objet -->
                <button type="button" class="px-2 py-1 text-white bg-red-500 rounded h:bg-red-600" onclick="removeObjectField(this)">Supprimer</button>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', template);
        }

        // Fonction pour supprimer un objet
        function removeObjectField(button) {
            // Trouver le conteneur du champ à supprimer (le parent du bouton)
            const container = button.closest('.flex');
            // Supprimer l'élément
            container.remove();
        }

        // Fonction pour mettre à jour le prix en fonction de l'objet sélectionné
        function updatePrice(selectElement) {
            const price = selectElement.options[selectElement.selectedIndex].dataset.price;
            const hiddenInput = selectElement.closest('div').querySelector('input[type="hidden"]');
            hiddenInput.value = price;
        }

        function updatePrice(selectElement) {
            const row = selectElement.closest('.flex');
            const price = selectElement.selectedOptions[0].dataset.price;
            const quantityInput = row.querySelector('input[type="number"]');
            const priceInput = row.querySelector('input[type="hidden"]');

            // Met à jour le prix quand la quantité change
            quantityInput.addEventListener('input', () => {
                priceInput.value = price * quantityInput.value;
            });

            // Initialisation
            priceInput.value = price * quantityInput.value;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionne le bouton et la popup par leurs IDs
            const submitButton = document.getElementById('submitButton');
            const confirmationPopup = document.getElementById('confirmationPopup');

            // Vérifie que le bouton est bien trouvé (utile pour le debug)
            if (!submitButton) {
                console.error("Bouton 'submitButton' introuvable");
                return;
            }

            // Ajoute l'événement click au bouton pour afficher la popup
            submitButton.addEventListener('click', function() {
                confirmationPopup.classList.remove('hidden');
            });
        });

        // Fonction globale pour annuler la commande (cache la popup)
        function cancelOrder() {
            document.getElementById('confirmationPopup').classList.add('hidden');
        }

        // Fonction globale pour confirmer la commande : cache la popup et soumet le formulaire
        window.confirmOrder = function() {
            document.getElementById('confirmationPopup').classList.add('hidden');
            document.getElementById('orderForm').submit();
        };
    </script>
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
