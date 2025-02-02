<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/commandes', [ViewsController::class, 'commandes'])->name('commandes');
route::get('/rappels', [ViewsController::class, 'rappels'])->name('rappels');
route::get('/créations', [ViewsController::class, 'creations'])->name('creationObjets');
route::get('/profil', [ViewsController::class, 'profil'])->name('profil');
route::get('/statistiques', [ViewsController::class, 'statistiques'])->name('statistiques');
route::get('/historiques', [ViewsController::class, 'historiques'])->name('historiques');
route::get('/acceuil', [ViewsController::class, 'acceuil'])->name('acceuil');
Route::get('/objets/create', [ObjetController::class, 'create'])->name('objets.create');
Route::get('/objets/liste', [ObjetController::class, 'objetsList'])->name('objets.show');
Route::post('/objets', [ObjetController::class, 'store'])->name('objets.store');

Route::get('/liste_des_commandes', [CommandeController::class, 'listeCommandes'])->name('listeCommandes');

// Route::get('/agence/modifier', [AgenceController::class, 'edit'])->name('modifierAgence');
// Route::get('/agence/modifier', [AgenceController::class, 'edit'])->name('modifierAgence');
Route::get('/modification_agence', [AgenceController::class, 'modificationAgence'])->name('pageModificationAgence');
Route::get('/modification_profil', [ProfileController::class, 'edit'])->name('pageModificationProfil');

Route::prefix('commandes')->group(function() {
    // Route pour afficher le formulaire de création de commande
    Route::get('create', [CommandeController::class, 'create'])->name('commandes.create');

    // Route pour stocker la commande
    Route::post('store', [CommandeController::class, 'store'])->name('commandes.store');

    // Route pour afficher la liste des commandes (si nécessaire)
    Route::get('index', [CommandeController::class, 'index'])->name('commandes.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';