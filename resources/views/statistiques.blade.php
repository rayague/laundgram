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
                        <i class="fas fa-fw fa-home"></i>
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
                <li class="bg-yellow-500 nav-item">
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

                    <h3 class="text-xl font-bold text-gray-800">Statistiques </h3>
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
                <div class="px-4 py-6 container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Titre de la section -->
                    <h2 class="mb-6 text-2xl font-bold text-gray-800">Statistiques de la journée</h2>

                    <!-- Tableau des statistiques -->
                    <div class="p-6 mb-6 bg-white rounded-lg shadow-lg">
                        <h3 class="mb-4 text-xl font-semibold text-gray-700">Détails des commandes de la journée</h3>

                        <!-- Tableau -->
                        <table class="w-full border-collapse table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Nom du client
                                    </th>
                                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Date de commande
                                    </th>
                                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Date de retrait
                                    </th>
                                    <th class="px-4 py-2 text-sm font-medium text-left text-gray-600">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Exemple de ligne de commande -->
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-700">Jean Dupont</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">2025-01-29</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">2025-01-30</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">30,00 €</td>
                                </tr>
                                <!-- Ajoute d'autres lignes selon les données -->
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-700">Marie Martin</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">2025-01-29</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">2025-01-31</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">45,00 €</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Résumé des statistiques -->
                        <div class="mt-6">
                            <div class="flex justify-between mb-4">
                                <div class="text-sm font-medium text-gray-700">Total des commandes</div>
                                <div class="text-sm text-gray-700">75,00 €</div>
                            </div>
                            <div class="flex justify-between mb-4">
                                <div class="text-sm font-medium text-gray-700">Nombre de commandes</div>
                                <div class="text-sm text-gray-700">2</div>
                            </div>
                            <div class="flex justify-between mb-4">
                                <div class="text-sm font-medium text-gray-700">Opérateur</div>
                                <div class="text-sm text-gray-700">Alice Dupuis</div>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton WhatsApp pour envoyer les statistiques -->
                    <div class="flex justify-end">
                        <button id="whatsapp-btn"
                            class="px-6 py-3 font-semibold text-white transition-all duration-200 bg-green-500 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                            onclick="sendWhatsApp()" disabled>
                            Envoyer par WhatsApp
                        </button>
                    </div>
                </div>

                <!-- Script pour désactiver le bouton après l'envoi -->


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

    <script>
        function sendWhatsApp() {
            // Logique d'envoi de message par WhatsApp (remplir avec l'API ou lien que tu utilises)
            alert("Les statistiques ont été envoyées par WhatsApp.");

            // Désactiver le bouton après l'envoi
            document.getElementById("whatsapp-btn").disabled = true;
            document.getElementById("whatsapp-btn").innerText = "Envoyé";
        }
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
