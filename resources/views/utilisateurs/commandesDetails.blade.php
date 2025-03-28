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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


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

                <!-- Begin Page Content -->
                <!-- Détails de la commande -->
                <div class="p-6 mx-4 mb-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Détails de la commande</h2>
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

                    <div class="space-y-6">
                        <!-- Informations générales -->
                        <div class="flex justify-between"><strong>Numéro de Commande:</strong>
                            <span>{{ $commande->numero }}</span>
                        </div>
                        <div class="flex justify-between"><strong>Client:</strong>
                            <span>{{ $commande->client }}</span>
                        </div>
                        <div class="flex justify-between"><strong>Numéro WhatsApp:</strong>
                            <span>{{ $commande->numero_whatsapp }}</span>
                        </div>
                        <div class="flex justify-between"><strong>Date de Dépôt:</strong>
                            <span>{{ \Carbon\Carbon::parse($commande->date_depot)->locale('fr')->isoFormat('LL') }}</span>
                        </div>
                        <div class="flex justify-between"><strong>Date de Retrait:</strong>
                            <span>{{ \Carbon\Carbon::parse($commande->date_retrait)->locale('fr')->isoFormat('LL') }}</span>
                        </div>

                        <!-- Liste des objets -->
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold">Objets Commandés:</h3>
                            <table class="w-full mt-4 border border-collapse table-auto">
                                <thead class="text-white bg-blue-500">
                                    <tr>
                                        <th class="px-4 py-2 border border-blue-400">Objet</th>
                                        <th class="px-4 py-2 border border-blue-400">Quantité</th>
                                        <th class="px-4 py-2 border border-blue-400">Description</th>
                                        {{-- <th class="px-4 py-2 border border-blue-400">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commande->objets as $objet)
                                        <tr class="border-b">
                                            <td class="px-4 py-2 border border-blue-400">{{ $objet->nom }}</td>
                                            <td class="px-4 py-2 border border-blue-400">{{ $objet->pivot->quantite }}
                                            </td>
                                            <td class="px-4 py-2 border border-blue-400">
                                                {{ $objet->pivot->description }}</td>
                                            {{-- <td class="px-4 py-2">
                                                <button type="submit"
                                                    class="px-4 py-2 text-white bg-red-500 rounded-md">Retirer</button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tableau des notes (retraits) -->
                    <div class="mt-8">
                        <h3 class="mb-4 text-xl font-semibold">Historique des Retraits / Notes</h3>
                        @if ($notes->isNotEmpty())
                            <table class="w-full border border-collapse table-auto">
                                <thead class="text-white bg-yellow-500">
                                    <tr>
                                        <th class="px-4 py-2 border border-yellow-400">Numéro de Facture</th>
                                        <th class="px-4 py-2 border border-yellow-400">Utilisateur</th>
                                        <th class="px-4 py-2 border border-yellow-400">Note</th>
                                        <th class="px-4 py-2 border border-yellow-400">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notes as $note)
                                        <tr class="hover:bg-blue-50">
                                            <td class="px-4 py-2 border border-yellow-300">{{ $commande->numero }}
                                            </td>
                                            <td class="px-4 py-2 border border-yellow-300">
                                                {{ $note->user->name ?? $note->user_id }}</td>
                                            <td class="px-4 py-2 border border-yellow-300">{{ $note->note }}</td>
                                            <td class="px-4 py-2 border border-yellow-300">
                                                {{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="p-3 text-lg font-black text-center text-white bg-orange-400 rounded">Aucune note
                                enregistrée pour cette commande.</p>
                        @endif
                    </div>

                    {{-- <div class="p-4 mt-8 bg-gray-200 rounded">
                        <h3 class="mb-4 text-xl font-semibold">Bilan Financier</h3>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-green"></span>
                                <strong>Total sans réduction :</strong>
                            </span>
                            <span>{{ number_format($originalTotal, 2, ',', ' ') }} FCFA</span>
                        </div>

                        @if ($remiseReduction > 0)
                            <div class="flex justify-between mb-2">
                                <span>
                                    <span class="status-indicator bg-yellow"></span>
                                    <strong>Réduction appliquée ({{ $remiseReduction }}%) :</strong>
                                </span>
                                <span>{{ number_format($discountAmount, 2, ',', ' ') }} FCFA</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Calcul :</strong></span>
                                <span
                                    class="p-1 text-white bg-green-500 rounded">{{ number_format($originalTotal, 2, ',', ' ') }}
                                    FCFA x {{ $remiseReduction }}%
                                    = {{ number_format($discountAmount, 2, ',', ' ') }} FCFA</span>
                            </div>
                        @else
                            <div class="flex justify-between mb-2">
                                <span>
                                    <span class="status-indicator bg-gray"></span>
                                    <strong>Réduction :</strong>
                                </span>
                                <span class="p-1 text-white bg-green-500 rounded">Aucune réduction appliquée</span>
                            </div>
                        @endif

                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-green"></span>
                                <strong>Total final :</strong>
                            </span>
                            <span>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-yellow"></span>
                                <strong>Avance Client :</strong>
                            </span>
                            <span>{{ number_format($commande->avance_client, 2, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-red"></span>
                                <strong>Solde Restant :</strong>
                            </span>
                            <span>{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span
                                    class="status-indicator {{ $commande->statut == 'Payé' ? 'bg-green' : 'bg-gray' }}"></span>
                                <strong>Statut :</strong>
                            </span>
                            <span
                                class="{{ $commande->statut === 'Non retirée' ? 'bg-red-500 rounded p-2 text-white' : 'bg-green-500 rounded p-2 text-white' }}">
                                {{ $commande->statut }}
                            </span>
                        </div>
                    </div> --}}


                    <div class="p-4 mt-8 bg-gray-200 rounded">
                        <h3 class="mb-4 text-xl font-semibold">Bilan Financier</h3>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-green"></span>
                                <strong>Total sans réduction :</strong>
                            </span>
                            <span>{{ number_format($originalTotal, 2, ',', ' ') }} FCFA</span>
                        </div>

                        @if ($remiseReduction > 0)
                            <div class="flex justify-between mb-2">
                                <span>
                                    <span class="status-indicator bg-yellow"></span>
                                    <strong>Réduction appliquée ({{ $remiseReduction }}%) :</strong>
                                </span>
                                <span>{{ number_format($discountAmount, 2, ',', ' ') }} FCFA</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span><strong>Calcul :</strong></span>
                                <span class="p-1 text-white bg-green-500 rounded">
                                    {{ number_format($originalTotal, 2, ',', ' ') }} FCFA x {{ $remiseReduction }}% =
                                    {{ number_format($discountAmount, 2, ',', ' ') }} FCFA
                                </span>
                            </div>
                        @else
                            <div class="flex justify-between mb-2">
                                <span>
                                    <span class="status-indicator bg-gray"></span>
                                    <strong>Réduction :</strong>
                                </span>
                                <span class="p-1 text-white bg-green-500 rounded">Aucune réduction appliquée</span>
                            </div>
                        @endif

                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-green"></span>
                                <strong>Total final :</strong>
                            </span>
                            <span>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-yellow"></span>
                                <strong>Avances cumulées :</strong>
                            </span>
                            <span>{{ number_format($commande->avance_client, 2, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span class="status-indicator bg-red"></span>
                                <strong>Solde restant :</strong>
                            </span>
                            <span>{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>
                                <span
                                    class="status-indicator {{ $commande->statut == 'Payé' ? 'bg-green' : 'bg-gray' }}"></span>
                                <strong>Statut :</strong>
                            </span>
                            <span
                                class="{{ $commande->statut === 'Non retirée' ? 'bg-red-500 rounded p-2 text-white' : 'bg-green-500 rounded p-2 text-white' }}">
                                {{ $commande->statut }}
                            </span>
                        </div>

                        <!-- Détails des avances individuelles -->
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold">Détails des Avances :</h4>
                            <ul>
                                @foreach ($commande->payments as $index => $payment)
                                    <li
                                        class="flex items-center justify-between p-2 my-3 text-white bg-blue-500 rounded">
                                        <span class="text-lg font-extrabold"> Avance {{ $index + 1 }} : </span>
                                        {{ number_format($payment->amount, 2, ',', ' ') }} FCFA
                                        @if ($payment->payment_method)
                                            ({{ $payment->payment_method }})
                                        @endif
                                        le {{ $payment->created_at->format('d/m/Y H:i') }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>







                    <!-- Formulaire de mise à jour des entrées d'argent -->
                    <div class="p-4 mt-8 bg-gray-200 rounded">
                        <h3 class="mb-4 text-xl font-semibold">Mettre à jour les entrées d'argent</h3>
                        <form action="{{ route('commande.updateFinancial', $commande->id) }}" method="POST"
                            class="flex items-center gap-4">
                            @csrf
                            @method('PUT')
                            <label for="montant_paye" class="block text-sm font-medium text-gray-700">
                                Nouvelle avance :
                            </label>
                            <input type="number" name="montant_paye" id="montant_paye" step="0.01"
                                min="0" value="0.00" class="w-32 p-2 border rounded-md" required>
                            <!-- Optionnel : Champ pour la méthode de paiement -->
                            <select name="payment_method" id="payment_method"
                                class="w-48 p-2 bg-white border rounded-md">
                                <option value="">Choisir</option>
                                <option value="Momo">Momo</option>
                                <option value="Espèce">Espèce</option>
                            </select>
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                Mettre à jour
                            </button>
                        </form>
                    </div>

                    <!-- Modal pour faire le retrait  -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Faire un retrait</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Détails de la commande -->
                                    <div class="p-6 mx-4 mb-6 rounded-lg shadow-md">


                                        <!-- Affichage du numéro de la facture et du nom -->
                                        <form action="{{ route('notes.store', ['commande' => $commande->id]) }}"
                                            method="POST">
                                            @csrf
                                            <!-- Affichage du numéro de la facture et du nom -->
                                            <div class="mb-4">
                                                <label for="facture_id"
                                                    class="block text-sm font-medium text-gray-700">Numéro de la
                                                    facture</label>
                                                <input type="text" id="facture_id" name="facture_id"
                                                    value="{{ $commande->numero }}" disabled
                                                    class="w-full p-2 mt-1 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed" />
                                            </div>

                                            <div class="mb-4">
                                                <label for="client_name"
                                                    class="block text-sm font-medium text-gray-700">Nom du
                                                    client</label>
                                                <input type="text" id="client_name" name="client_name"
                                                    value="{{ $commande->client }}" disabled
                                                    class="w-full p-2 mt-1 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed" />
                                            </div>

                                            <!-- Champ de saisie pour l'utilisateur -->
                                            <div class="mb-4">
                                                <label for="note"
                                                    class="block text-sm font-medium text-gray-700">Montant à
                                                    retirer</label>
                                                <textarea rows="4" class="w-full p-2 mt-1 border border-gray-300 rounded-md" required name="note"
                                                    id="note"></textarea>

                                            </div>

                                            <!-- Bouton de validation -->
                                            <div>
                                                <button type="submit"
                                                    class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                    Valider le retrait
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- Boutons de navigation -->
                    <div class="flex flex-col items-center justify-between gap-4 my-8 ml-4">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            class="flex items-center justify-center w-full p-2 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            <i class="mr-2 fas fa-hand-holding-usd"></i> Faire un retrait
                        </button>
                        <a href="{{ route('factures.print', ['commande' => $commande->id]) }}"
                            class="flex items-center justify-center w-full p-2 text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-600"
                            target="_blank">
                            <i class="mr-2 fas fa-print"></i> Imprimer
                        </a>

                        <a href="https://api.whatsapp.com/send?phone={{ $commande->numero_whatsapp }}&text={{ urlencode('Bonjour, voici votre facture : ' . route('factures.download', ['id' => $commande->id])) }}"
                            class="flex items-center justify-center w-full p-2 text-center text-white bg-green-500 rounded-md hover:bg-green-600"
                            target="_blank">
                            <i class="mr-2 fab fa-whatsapp"></i> Envoyer par WhatsApp
                        </a>

                    </div>

                    <!-- Button trigger modal -->



                </div>
                <!-- Boutons de navigation -->
                <div class="flex flex-row items-center justify-between gap-4 mx-4 my-10">
                    <a href="{{ route('listeCommandes') }}"
                        class="p-2 text-white rounded-md bg-sky-500 hover:bg-sky-600">
                        Retour à la liste des commandes
                    </a>
                    <form action="{{ route('commandes.valider', $commande->id) }}" method="POST"
                        onsubmit="return confirm('Voulez-vous vraiment valider cette facture ?');">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="p-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                            Valider la facture
                        </button>
                    </form>

                </div>

            </div>
            <!-- /.container-fluid -->



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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
