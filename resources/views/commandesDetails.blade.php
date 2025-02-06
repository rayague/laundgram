<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="shortcut icon" href="{{ asset('images/logo1.ico') }}" type="image/x-icon"> --}}


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

                <!-- Nav Item - Création d'Objets -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('creationObjets') }}">
                        <i class="fas fa-fw fa-plus-square"></i>
                        <span class="font-weight-bold">CRÉER OBJETS & PRIX</span>
                    </a>
                </li>

                <!-- Nav Item - Rappels -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('rappels') }}">
                        <i class="fas fa-fw fa-bell"></i>
                        <span class="font-weight-bold">RAPPELS</span>
                    </a>
                </li>

                <!-- Nav Item - Statistiques -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('statistiques') }}">
                        <i class="fas fa-fw fa-chart-bar"></i>
                        <span class="font-weight-bold">STATISTIQUES</span>
                    </a>
                </li>

                <!-- Nav Item - Horaires -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('horaires') }}">
                        <i class="fas fa-fw fa-clock"></i>
                        <span class="font-weight-bold">HORAIRES</span>
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

                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
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
                    <h2 class="mb-4 text-xl font-bold">Liste des Commandes</h2>

                    <div class="container py-8 mx-auto">
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="mb-4 text-2xl font-bold">Détails de la commande</h2>

                            <div class="flex flex-col gap-4">
                                <!-- Informations générales sur la commande -->
                                <div class="flex justify-between">
                                    <span class="font-bold">Numéro de Commande :</span>
                                    <span>{{ $commande->numero }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Client :</span>
                                    <span>{{ $commande->client }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Numéro WhatsApp :</span>
                                    <span>{{ $commande->numero_whatsapp }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Date de Dépôt :</span>
                                    <span>{{ \Carbon\Carbon::parse($commande->date_depot)->locale('fr')->isoFormat('LL') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Date de Retrait :</span>
                                    <span>{{ \Carbon\Carbon::parse($commande->date_retrait)->locale('fr')->isoFormat('LL') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Heure de Retrait :</span>
                                    <span>{{ \Carbon\Carbon::parse($commande->heure_retrait)->locale('fr')->isoFormat('HH:mm') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Type de Lavage :</span>
                                    <span>{{ $commande->type_lavage }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-bold">Emplacement :</span>
                                    <span>{{ $commande->emplacement }}</span>
                                </div>

                                <div class="mt-6">
                                    <h3 class="mb-4 text-xl font-semibold">Objets Commandés :</h3>
                                    <table class="w-full border border-collapse border-gray-200 table-auto">
                                        <thead class="text-white bg-gray-800">
                                            <tr>
                                                <th class="px-4 py-2 border border-gray-300">Objet</th>
                                                <th class="px-4 py-2 border border-gray-300">Quantité</th>
                                                <th class="px-4 py-2 border border-gray-300">Quantité à retirer</th>
                                                <!-- Nouvelle colonne -->
                                                <th class="px-4 py-2 border border-gray-300">Action</th>
                                                <!-- Colonne pour le bouton -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- dd($pivot->quantite, $request->input('quantite_retirer')); --}}

                                            @foreach ($commande->objets as $objet)
                                                <tr>
                                                    <td class="px-4 py-2 border border-gray-300">
                                                        {{ $objet->nom }}
                                                    </td>
                                                    <td class="px-4 py-2 border border-gray-300">
                                                        {{ $objet->pivot->quantite }}
                                                    </td>
                                                    <td class="px-4 py-2 border border-gray-300">
                                                        <!-- Input pour spécifier la quantité à retirer -->
                                                        <form
                                                            action="{{ route('commande.retirer', ['commande' => $commande->id, 'objet' => $objet->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="number" name="quantite_retirer"
                                                                min="1" max="{{ $objet->pivot->quantite }}"
                                                                value="1" class="w-full p-2 border">
                                                    </td>
                                                    <td class="px-4 py-2 border border-gray-300">
                                                        <!-- Bouton pour soumettre la quantité à retirer -->
                                                        <button type="submit"
                                                            class="px-4 py-2 text-white bg-red-500 rounded-md">Retirer</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                @if ($objet->pivot->quantite == 0)
                                                    <tr>
                                                        <td colspan="4"
                                                            class="px-4 py-2 text-center text-green-500">Produit
                                                            complètement retiré.</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Statut de la commande -->
                                <div class="flex justify-between mt-4">
                                    <span class="font-bold">Statut :</span>
                                    <span
                                        class="{{ $commande->status === 'completed' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ ucfirst($commande->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ajouter ce lien au début ou à la fin de la page de détails -->

                    <div class="flex gap-2 my-4">
                        <a href="{{ route('listeCommandes') }}"
                            class="p-2 text-white rounded-md hover:underline bg-sky-500 hover:bg-sky-600">
                            Retour à la liste des commandes
                        </a>
                        <a href="{{ route('commandes.create') }}"
                            class="px-6 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600">
                            Créer une nouvelle commande
                        </a>
                    </div>
                </div>
                <!-- /.container-fluid -->



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
        function addObjectField() {
            const container = document.getElementById('objects-container');
            const div = document.createElement('div');
            div.classList.add('flex', 'gap-4', 'mb-2');
            div.innerHTML = `
            <select name="objets[0][id]" class="w-full p-2 mt-1 border rounded-md">
@foreach ($objets as $objet)
                                                <option value="{{ $objet->id }}">{{ $objet->nom }}</option>
                                            @endforeach
            </select>
            <input type="number" class="w-20 p-2 mt-1 border rounded-md" name="objets[0][quantite]" placeholder="Qté" min="1" required>
          `;
            container.appendChild(div);
        }
    </script> --}}
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
