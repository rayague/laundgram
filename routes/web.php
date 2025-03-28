<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;

Route::get('/', function () {
    return view('welcome');
});


// Admin routes
route::get('/commandes_administration', [AdminController::class, 'commandes'])->name('commandesAdmin');
route::get('/rappels_administration', [AdminController::class, 'rappels'])->name('rappelsAdmin');
Route::get('/utilisateurs_administration', [AdminController::class, 'index'])->name('utilisateursAdmin');
Route::get('/profil_administrateur', [AdminController::class, 'profil'])->name('profilAdmin');
Route::get('/en_attente_administration', [AdminController::class, 'enAttente'])->name('pendingAdmin');
Route::get('/comptabilite_administration', [AdminController::class, 'comptabilite'])->name('comptabiliteAdmin');

Route::get('/liste_des_commandes_administration', [AdminController::class, 'listeCommandes'])->name('listeCommandesAdmin');
Route::get('/commandes/{id}_administration', [AdminController::class, 'show'])->name('commandes.showAdmin');
Route::post('/commande/{commande}/objet/{objet}/retirer_administration', [AdminController::class, 'retirerObjet'])->name('commande.retirer');
Route::post('/commandes/{commande}/retirer-plusieurs_administration', [AdminController::class, 'retirerPlusieursObjets'])->name('commande.retirerPlusieursAdmin');
Route::get('/journalieres_administration', [AdminController::class, 'journalieres'])->name('commandes.journalieresAdmin');
Route::get('/factures/{commande}/imprimer_administration', [AdminController::class, 'print'])->name('factures.printAdmin');
Route::put('/commande/{id}/update-financial_administration', [AdminController::class, 'updateFinancial'])->name('commande.updateFinancialAdmin');


// Route::get('/agence/modifier', [AgenceController::class, 'edit'])->name('modifierAgence');
// Route::get('/agence/modifier', [AgenceController::class, 'edit'])->name('modifierAgence');
Route::get('/modification_agence', [AgenceController::class, 'modificationAgence'])->name('pageModificationAgence');
Route::get('/modification_profil', [ProfileController::class, 'edit'])->name('pageModificationProfil');
Route::get('/journalieres', [CommandeController::class, 'journalieres'])->name('commandes.journalieres');
Route::get('/factures/{commande}/imprimer', [FactureController::class, 'print'])->name('factures.print');
Route::get('/impression_liste_commandes', [CommandeController::class, 'printListeCommandes'])->name('listeCommandes.print');
Route::get('/impression_liste_commandes_en_attente', [CommandeController::class, 'printListeCommandesPending'])->name('listeCommandesPending.print');
Route::get('/impression_liste_commandes_retiree', [CommandeController::class, 'printListeCommandesRetraits'])->name('listeCommandesRetraits.print');








// Users routes
route::get('/commandes', [ViewsController::class, 'commandes'])->name('commandes');
route::get('/rappels', [ViewsController::class, 'rappels'])->name('rappels');
Route::get('/details_retraits/{id}', [ViewsController::class, 'detailsRetrait'])->name('retrait.details');

route::get('/créations', [ViewsController::class, 'creations'])->name('creationObjets');
route::get('/profil', [ViewsController::class, 'profil'])->name('profil');
route::get('/statistiques', [ViewsController::class, 'statistiques'])->name('statistiques');
route::get('/historiques', [ViewsController::class, 'historiques'])->name('historiques');
route::get('/acceuil', [ViewsController::class, 'acceuil'])->name('acceuil');
Route::get('/objets/create', [ObjectController::class, 'create'])->name('objets.create');
Route::get('/objets/liste', [ObjectController::class, 'objetsList'])->name('objets.show');
Route::post('/objets', [ObjectController::class, 'store'])->name('objets.store');
Route::get('/en_attente', [ViewsController::class, 'enAttente'])->name('pending');
Route::get('/comptabilite', [ViewsController::class, 'comptabilite'])->name('comptabilite');
Route::get('/retrait/{commande}', [ViewsController::class, 'pageRetrait'])->name('faireRetrait');

// Liste des commandes en attente

Route::get('/commandes_en_attente/filtrer', [CommandeController::class, 'filtrerPending'])->name('commandes.filtrerPending');
Route::get('/retrait/commandes/filtrer', [CommandeController::class, 'RetraitsFiltrer'])->name('commandes.filtrerRetrait');
Route::get('/commandes/retrait', [CommandeController::class, 'retraitPending'])->name('commandes.retraitPending');






Route::post('/retirer', [FactureController::class, 'submit'])->name('retirers.submit');
Route::post('/facture/{commande}/notes', [FactureController::class, 'storeNote'])->name('notes.store');




// Afficher le PDF en mode streaming (prévisualisation)
Route::get('/factures/{id}/stream', [FactureController::class, 'stream'])->name('factures.stream');

// Télécharger le PDF
Route::get('/factures/{id}/download', [FactureController::class, 'download'])->name('factures.download');




Route::put('/commandes/{id}/valider', [CommandeController::class, 'valider'])->name('commandes.valider');



Route::get('/liste_des_commandes', [CommandeController::class, 'listeCommandes'])->name('listeCommandes');
Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');
Route::post('/commande/{commande}/objet/{objet}/retirer', [CommandeController::class, 'retirerObjet'])->name('commande.retirer');
Route::post('/commandes/{commande}/retirer-plusieurs', [CommandeController::class, 'retirerPlusieursObjets'])->name('commande.retirerPlusieurs');



// Route::get('/agence/modifier', [AgenceController::class, 'edit'])->name('modifierAgence');
// Route::get('/agence/modifier', [AgenceController::class, 'edit'])->name('modifierAgence');
Route::get('/modification_agence', [AgenceController::class, 'modificationAgence'])->name('pageModificationAgence');
Route::get('/modification_profil', [ProfileController::class, 'edit'])->name('pageModificationProfil');
Route::get('/journalieres', [CommandeController::class, 'journalieres'])->name('commandes.journalieres');
Route::get('/factures/{commande}/imprimer', [FactureController::class, 'print'])->name('factures.print');
Route::put('/commande/{commande}/update-financial', [CommandeController::class, 'updateFinancial'])->name('commande.updateFinancial');


// Route::middleware(['auth'])->group(function () {
// Afficher la liste des utilisateurs
// Route::get('/utilisateurs', [AdminController::class, 'index'])->name('users.index');

// Ajouter un utilisateur
Route::get('/users/create', [AdminController::class, 'create'])->name('admin.users.create');
Route::post('/users', [AdminController::class, 'store'])->name('admin.users.store');


// Supprimer un utilisateur
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
// });

Route::prefix('commandes')->group(function () {
    // Route pour afficher le formulaire de création de commande
    Route::get('create', [CommandeController::class, 'create'])->name('commandes.create');

    // Route pour stocker la commande
    Route::post('store', [CommandeController::class, 'store'])->name('commandes.store');

    // Route pour afficher la liste des commandes (si nécessaire)
    Route::get('index', [CommandeController::class, 'index'])->name('commandes.index');
});

Route::get('/dashboard', function () {
    return view('utilisateurs.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/administration', function () {
    return view('administrateur.dashboard');
})->middleware(['auth', 'verified'])->name('administration');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
