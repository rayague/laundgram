<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Objets;
use App\Models\Objects;
use App\Models\Commande;
use Illuminate\Http\Request;

class ViewsController extends Controller
{

    public function acceuil()
    {
        // // Récupérer les horaires existants
        // $horaire = Horaire::first();
        // $hours = OpeningHour::all();


        // Logique spécifique pour la page des commandes (si nécessaire)
        return view('utilisateurs.dashboard'); // Retourne la vue 'commandes.blade.php'
    }
    public function commandes()
    {
       // Récupérer les objets disponibles
       $objets = Objets::all();

       // Générer un numéro de commande unique
       $annee = Carbon::now()->year;
       $prefixe = "ETS-NKPA-" . $annee . "-";

       // Trouver le dernier numéro de commande
       $dernierNumero = Commande::where('numero', 'like', $prefixe . '%')
                               ->latest('created_at')
                               ->first();

    //    Générer le prochain numéro de commande
       if ($dernierNumero) {
           $dernierNum = (int) substr($dernierNumero->numero, -3);
           $nouveauNum = str_pad($dernierNum + 1, 3, '0', STR_PAD_LEFT);
       } else {
           $nouveauNum = '001';
       }

    //    Combiné pour avoir le numéro complet de la commande
       $numeroCommande = $prefixe . $nouveauNum;

    //    Passer la variable $numeroCommande et les objets à la vue
       return view('utilisateurs.commandes', compact('objets'));
    }



    public function rappels()
    {
        $today = Carbon::today()->toDateString();
        $commandes = Commande::whereDate('date_retrait', $today)
                        ->with(['objets', 'user']) // charger les relations si nécessaire
                        ->get();

        return view('utilisateurs.rappels', compact('commandes'));
    }


    public function creations()
    {
        // Logique spécifique pour la page des créations (si nécessaire)
        return view('administrateur.creationObjets '); // Retourne la vue 'creations.blade.php'
    }

    public function profil()
    {
        // Logique spécifique pour la page du profil (si nécessaire)
        return view('utilisateurs.profil'); // Retourne la vue 'profil.blade.php'
    }

    public function historiques()
    {
        // Logique spécifique pour la page des historiques (si nécessaire)
        return view('utilisateurs.historiques'); // Retourne la vue 'historiques.blade.php'
    }

    public function detailsRetrait($id)
{
    // Récupère le retrait avec ses relations
    // $retrait = Retrait::with(['commande.objets', 'user'])->findOrFail($id);

    // Retourne la vue avec le retrait
    return view('utilisateurs.detailsRetraits',);
}

public function enAttente()
{
    return view('utilisateurs.pending'); // Retourne la vue 'statistiques.blade.php'
}

public function comptabilite()
{
    return view('utilisateurs.comptabilite'); // Retourne la vue 'statistiques.blade.php'
}


}