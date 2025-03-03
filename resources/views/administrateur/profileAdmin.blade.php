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
                href="{{ route('administration') }}">

                <div class="mx-3 sidebar-brand-text">Laundgram</div>
            </a>

            <!-- Divider -->
            <hr class="my-0 sidebar-divider">

            <nav class="text-white bg-gray-800 sidebar">
                <!-- Nav Item - Tableau de Bord -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('administration') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span class="font-weight-bold">TABLEAU DE BORD</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Accueil -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('administration') }}">
                        <i class="fas fa-fw fa-home"></i>
                        <span class="font-weight-bold">ACCUEIL</span>
                    </a>
                </li>

                <!-- Nav Item - Création d'Objets -->
                <li class="nav-item ">
                    <a class="nav-link"
                        href="

                    {{ route('creationObjets') }}

                    ">
                        <i class="fas fa-fw fa-plus-square"></i>
                        <span class="font-weight-bold">CRÉER OBJETS & PRIX</span>
                    </a>
                </li>

                <!-- Nav Item - Commandes -->
                <li class="nav-item">
                    <a class="nav-link" href="

                    {{ route('commandes') }}

                    ">
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
                <li class="bg-yellow-500 nav-item">
                    <a class="nav-link" href="{{ route('comptabilite') }}">
                        <i class="fas fa-fw fa-coins"></i>
                        <span class="font-weight-bold">COMPTABILITE</span>
                    </a>
                </li>
                <!-- Nav Item - Rappels -->
                <li class="nav-item ">
                    <a class="nav-link" href="

                    {{ route('rappels') }}

                    ">
                        <i class="fas fa-fw fa-bell"></i>
                        <span class="font-weight-bold">RETRAITS</span>
                    </a>
                </li>

                <!-- Nav Item - Création d'Objets -->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('utilisateurs') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span class="font-weight-bold">UTILISATEURS</span>
                    </a>
                </li>

                <!-- Nav Item - Profil -->
                <li class="bg-yellow-500 nav-item">
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

                    <h3 class="text-xl font-bold text-gray-800">Profil </h3>
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
                <div class="container flex flex-col gap-4 p-4 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Card: Informations utilisateur -->
                    <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                        <!-- Header -->
                        <div class="flex items-center justify-between px-6 py-4 bg-gray-500">
                            <h2 class="flex items-center text-lg font-bold text-white">
                                <i class="mr-2 fas fa-user fa-fw"></i>

                                Informations de l'utilisateur
                            </h2>
                            <div class="space-x-2">
                                <!-- Bouton Modifier -->
                                <a href="{{ route('pageModificationProfil') }}"
                                    class="px-4 py-2 font-semibold text-white bg-yellow-400 rounded-md shadow hover:bg-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-1"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0l-9.5 9.5a1 1 0 00-.263.475l-1 4a1 1 0 001.262 1.262l4-1a1 1 0 00.475-.263l9.5-9.5a2 2 0 000-2.828z" />
                                    </svg>
                                    Modifier
                                </a>
                                <!-- Bouton Supprimer -->
                                <button onclick="confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')"
                                    class="px-4 py-2 font-semibold text-white bg-red-500 rounded-md shadow hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-1"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 3a1 1 0 011-1h.004a1 1 0 011 .998L11 3h3a1 1 0 011 1v1H5V4a1 1 0 011-1h3zm0 2H5v11a2 2 0 002 2h6a2 2 0 002-2V5H9zm4 3a1 1 0 10-2 0v4a1 1 0 102 0V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                        <!-- Body -->
                        <div class="p-4">
                            <div class="flex flex-col space-y-4">
                                <p class="p-2 font-medium text-gray-700 bg-gray-200 border rounded"><strong>Nom
                                        :</strong> {{ Auth::user()->name }}
                                </p>
                                <p class="p-2 font-medium text-gray-700 bg-gray-200 border rounded"><strong>Email
                                        :</strong>
                                    {{ Auth::user()->email }}</p>
                                <p class="p-2 font-medium text-gray-700 bg-gray-200 border rounded"><strong>Date de
                                        création
                                        :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container p-6 mx-auto bg-white rounded-lg shadow-lg">
                        <div class="flex items-start justify-between pb-4 border-b">

                            <div class="w-full">

                                <h1 class="flex items-center my-4 text-2xl font-bold text-yellow-500">
                                    <i class="w-6 h-6 mr-2 text-yellow-500 fas fa-building"></i>
                                    ETS N'KPA PRESSING LA NETTETE
                                </h1>
                                <p class="p-3 mb-2 text-sm text-gray-800 bg-gray-200 border rounded">SERVICE DE
                                    NETTOYAGE ET LAVAGE A SEC</p>
                                <p class="p-3 mb-2 text-sm text-gray-700 bg-gray-200 border rounded">RCCM:
                                    RB/COT/17A34380 | IFU: 12012001555601</p>
                                <p class="p-3 mb-2 text-sm text-gray-800 bg-gray-200 border rounded">
                                    <span class="font-semibold">Tel:</span> 95784635 (Accueil) | 65588538 (Direction)
                                </p>
                                <p class="p-3 mb-2 text-sm font-semibold text-gray-900 bg-gray-200 border rounded">
                                    AGENCE DE AGLA
                                </p>
                                <p class="p-3 mb-2 text-sm text-gray-700 bg-gray-200 border rounded">AGLA NON LOIN DE
                                    L'EGLISE CATHOLIQUE ST PIERRE ET PAUL</p>
                            </div>



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

    <script>
        // Ouvrir le modal
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        // Fermer le modal
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        // Sélectionner les éléments du DOM
        const modal = document.getElementById('modal');
        const openModalButton = document.getElementById('openModalButton');
        const cancelButton = document.getElementById('cancelButton');
        const updateForm = document.getElementById('updateForm');

        // Ouvrir le modal lorsque l'utilisateur clique sur "Modifier"
        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden'); // Affiche le modal en enlevant la classe "hidden"
        });

        // Fermer le modal lorsque l'utilisateur clique sur "Annuler"
        cancelButton.addEventListener('click', () => {
            modal.classList.add('hidden'); // Cache le modal
        });

        // Soumettre le formulaire
        updateForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Empêche le formulaire de se soumettre normalement (pour l'instant)
            alert(
                'Modifications enregistrées !'
            ); // Vous pouvez ici envoyer les données à votre backend ou les traiter
            modal.classList.add('hidden'); // Ferme le modal après la soumission
        });
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
