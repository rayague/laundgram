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
                <li class=" nav-item">
                    <a class="nav-link" href="{{ route('acceuil') }}">
                        <i class=" fas fa-fw fa-home"></i>
                        <span class="font-weight-bold">ACCUEIL</span>
                    </a>
                </li>

                <!-- Nav Item - Commandes -->
                <li class="nav-item">
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
                <li class="bg-yellow-500 nav-item">
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

                    <h3 class="text-xl font-bold text-gray-800">Rappels </h3>
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
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- <div class="container">
                        <div class="header">
                            <h1>Facture de Retrait</h1>
                            <p>Commande #{{ $commande->numero }}</p>
                        </div>

                        <div class="facture-info">
                            <div>
                                <span class="commande-number">Numéro de Commande : {{ $commande->numero }}</span>
                            </div>
                            <div>Date de dépôt : {{ $commande->date_depot }}</div>
                            <div>Date de retrait : {{ $commande->date_retrait }}</div>
                            <div>Client : {{ $commande->client }}</div>
                            <div>Emplacement : {{ $commande->emplacement }}</div>
                        </div>

                        <h3>Retraits :</h3>
                        <table class="retraits-table">
                            <thead>
                                <tr>
                                    <th>Objet</th>
                                    <th>Quantité Retirée</th>
                                    <th>Prix Unitaire</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commande->retraits as $retrait)
                                    <tr>
                                        <td>{{ $retrait->objet->nom }}</td>
                                        <td>{{ $retrait->quantite }}</td>
                                        <td>{{ number_format($retrait->objet->prix_unitaire, 2, ',', ' ') }} FCFA</td>
                                        <td>{{ number_format($retrait->quantite * $retrait->objet->prix_unitaire, 2, ',', ' ') }}
                                            FCFA</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="footer">
                            <p>Merci pour votre commande !</p>
                        </div>

                        <div class="actions">
                            <!-- Vous pouvez créer un bouton pour télécharger ou imprimer la facture -->
                            <a href="#" onclick="window.print()">Imprimer la Facture</a>
                            <a href="{{ route('send_whatsapp', ['commande' => $commande->id]) }}">Envoyer par
                                WhatsApp</a>
                        </div>
                    </div> --}}


                    <div class="p-6 mx-auto container-fluids ">
                        <h2 class="mb-6 text-3xl font-semibold text-gray-800">Liste des Retraits</h2>

                        @if (session('error'))
                            <div class="mb-4 text-red-500">{{ session('error') }}</div>
                        @endif

                        <div class="overflow-x-auto bg-white rounded-lg shadow">
                            <table class="min-w-full text-left table-auto">
                                <thead class="text-white bg-gray-800">
                                    <tr>
                                        <th class="px-4 py-4 border border-white">ID Retrait</th>
                                        <th class="px-4 py-4 border border-white">Nom Client</th>
                                        <th class="px-4 py-4 border border-white">Commande</th>
                                        <th class="px-4 py-4 border border-white">Objet</th>
                                        <th class="px-4 py-4 border border-white">Quantité Retirée</th>
                                        <th class="px-4 py-4 border border-white">Date du Retrait</th>
                                        <th class="px-4 py-4 border border-white">Utilisateur</th>
                                        <th class="px-4 py-4 border border-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($commandes as $commande)
                                        @foreach ($commande->objets as $objet)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-2 py-3 border">{{ $commande->id }}</td>
                                                <td class="px-2 py-3 border">{{ $commande->client }}</td>
                                                <td class="px-2 py-3 border">{{ $commande->numero }}</td>
                                                <td class="px-2 py-3 border">{{ $objet->nom }}</td>
                                                <td class="px-2 py-3 border">{{ $objet->pivot->quantite }}</td>
                                                <!-- Quantité dans la relation pivot -->
                                                <td class="px-2 py-3 border">{{ $commande->date_retrait }}</td>
                                                <td class="px-2 py-3 border">
                                                    {{ $commande->user ? $commande->user->name : 'Utilisateur inconnu' }}
                                                </td>
                                                <td class="px-2 py-3 border">
                                                    <a href="{{ route('retrait.details', $commande->id) }}"
                                                        class="p-1 font-semibold text-sky-500 hover:text-sky-600">
                                                        Voir les détails
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="8" class="py-4 font-semibold text-center">
                                                <span class="p-2 font-bold text-white bg-red-500 rounded">


                                                    Aucune commande à retirer aujourd'hui.
                                                </span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

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
