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
                        <div class="relative px-4 py-3 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="font-medium">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container p-8 mx-auto rounded-lg shadow-2xl bg-slate-50">
                        <!-- En-tête de la facture -->
                        <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-300">
                            <div>
                                <h1 class="flex items-center text-3xl font-bold text-blue-600">
                                    <i class="mr-3 fas fa-file-invoice"></i>
                                    Facture de Retrait
                                </h1>
                                <p class="text-gray-500">ETS N'KPA PRESSING LA NETTETE</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600">
                                    <i class="mr-1 fas fa-calendar-alt"></i>
                                    Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <i class="mr-1 fas fa-clock"></i>
                                    Heure: {{ \Carbon\Carbon::now()->format('H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Informations de la Commande -->
                        <div class="mb-8">
                            <h2 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 fas fa-info-circle"></i>
                                Informations de la Commande
                            </h2>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div class="space-y-2">
                                    <p>
                                        <span class="font-semibold text-gray-700">Numéro de commande :</span>
                                        <span class="text-gray-900">{{ $retrait->commande->numero }}</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Client :</span>
                                        <span class="text-gray-900">{{ $retrait->commande->client }}</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">WhatsApp :</span>
                                        <span class="text-gray-900">{{ $retrait->commande->numero_whatsapp }}</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Date de dépôt :</span>
                                        <span
                                            class="text-gray-900">{{ \Carbon\Carbon::parse($retrait->commande->date_depot)->format('d/m/Y') }}</span>
                                    </p>
                                </div>
                                <div class="space-y-2">
                                    <p>
                                        <span class="font-semibold text-gray-700">Date de retrait :</span>
                                        <span
                                            class="text-gray-900">{{ \Carbon\Carbon::parse($retrait->commande->date_retrait)->format('d/m/Y') }}</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Heure de retrait :</span>
                                        <span class="text-gray-900">{{ $retrait->commande->heure_retrait }}</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Type de lavage :</span>
                                        <span class="text-gray-900">{{ $retrait->commande->type_lavage }}</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Emplacement :</span>
                                        <span class="text-gray-900">{{ $retrait->commande->emplacement }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Liste des Objets Commandés -->
                        <div class="mb-8">
                            <h2 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 fas fa-box-open"></i>
                                Objets Commandés
                            </h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full border border-collapse border-gray-300 table-auto">
                                    <thead class="text-white bg-gray-800">
                                        <tr>
                                            <th class="px-4 py-2 border">Objet</th>
                                            <th class="px-4 py-2 border">Quantité</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        @foreach ($retrait->commande->objets as $objet)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-2 border">{{ $objet->nom }}</td>
                                                <td class="px-4 py-2 border">{{ $objet->pivot->quantite }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Informations du Retrait -->
                        <div class="mb-8">
                            <h2 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 fas fa-hand-holding-usd"></i>
                                Informations du Retrait
                            </h2>
                            <div class="space-y-2">
                                <p>
                                    <span class="font-semibold text-gray-700">Quantité retirée :</span>
                                    <span class="text-gray-900">{{ $retrait->quantite_retirer }}</span>
                                </p>
                                <p>
                                    <span class="font-semibold text-gray-700">Effectué par :</span>
                                    <span class="text-gray-900">{{ $retrait->user->name }}</span>
                                </p>
                                <p>
                                    <span class="font-semibold text-gray-700">Date et heure du retrait :</span>
                                    <span
                                        class="text-gray-900">{{ \Carbon\Carbon::parse($retrait->retrait_at)->format('d/m/Y H:i:s') }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Résumé Financier -->
                        @php
                            // Calcul du coût total de la commande (prix * quantité de chaque objet)
                            $totalCommande = 0;
                            foreach ($retrait->commande->objets as $objet) {
                                $totalCommande += $objet->prix * $objet->pivot->quantite;
                            }
                            // Total des retraits effectués pour la commande (à partir du champ "cout" de chaque retrait)
                            $totalRetraits = $retrait->commande->retraits->sum('cout');
                            $montantRecu = $retrait->commande->montant_remis;
                            $soldeRestant = $montantRecu - $totalRetraits;
                            $resteAPayer = max(0, $totalCommande - $montantRecu);
                        @endphp

                        <!-- Résumé Financier -->
                        <div class="mb-8">
                            <h2 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 fas fa-calculator"></i>
                                Résumé Financier
                            </h2>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div class="space-y-2">
                                    <p>
                                        <span class="font-semibold text-gray-700">Montant reçu :</span>
                                        <span
                                            class="text-gray-900">{{ number_format($retrait->commande->montant_remis, 2) }}
                                            FCFA</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Total retiré :</span>
                                        <span
                                            class="text-gray-900">{{ number_format($retrait->commande->total_retraits, 2) }}
                                            FCFA</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Solde restant :</span>
                                        <span
                                            class="text-gray-900">{{ number_format($retrait->commande->solde_restant, 2) }}
                                            FCFA</span>
                                    </p>
                                </div>
                                <div class="space-y-2">
                                    <p>
                                        <span class="font-semibold text-gray-700">Coût total de la commande :</span>
                                        <span
                                            class="text-gray-900">{{ number_format($retrait->commande->cout_total_commande, 2) }}
                                            FCFA</span>
                                    </p>
                                    <p>
                                        <span class="font-semibold text-gray-700">Reste à payer :</span>
                                        <span
                                            class="text-gray-900">{{ number_format($retrait->commande->reste_a_payer, 2) }}
                                            FCFA</span>
                                    </p>
                                </div>
                            </div>
                        </div>



                        <!-- Boutons d'action -->
                        <div class="flex justify-end space-x-4 no-print">
                            <button onclick="window.print()"
                                class="flex items-center px-6 py-3 text-white bg-blue-500 rounded hover:bg-blue-600">
                                <i class="mr-2 fas fa-print"></i> Imprimer
                            </button>
                            <button
                                class="flex items-center px-6 py-3 text-white bg-green-500 rounded hover:bg-green-600">
                                <i class="mr-2 fab fa-whatsapp"></i> Envoyer par WhatsApp
                            </button>
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
                            style="font-family: 'Dancing Script', cursive;">Laundgram</span>
                        Ray
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
