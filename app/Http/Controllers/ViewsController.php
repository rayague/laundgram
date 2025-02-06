<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Objet;
use App\Models\Horaire;
use App\Models\Commande;
use App\Models\OpeningHour;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function acceuil()
    {
        // Récupérer les horaires existants
        $horaire = Horaire::first();
        $hours = OpeningHour::all();


        // Logique spécifique pour la page des commandes (si nécessaire)
        return view('dashboard',compact('horaire', 'hours')); // Retourne la vue 'commandes.blade.php'
    }
    public function commandes()
    {
       // Récupérer les objets disponibles
       $objets = Objet::all();

       // Générer un numéro de commande unique
       $annee = Carbon::now()->year;
       $prefixe = "ETS-NKPA-" . $annee . "-";

       // Trouver le dernier numéro de commande
       $dernierNumero = Commande::where('numero', 'like', $prefixe . '%')
                               ->latest('created_at')
                               ->first();

       // Générer le prochain numéro de commande
       if ($dernierNumero) {
           $dernierNum = (int) substr($dernierNumero->numero, -3);
           $nouveauNum = str_pad($dernierNum + 1, 3, '0', STR_PAD_LEFT);
       } else {
           $nouveauNum = '001';
       }

       // Combiné pour avoir le numéro complet de la commande
       $numeroCommande = $prefixe . $nouveauNum;

       // Passer la variable $numeroCommande et les objets à la vue
       return view('commandes', compact('objets', 'numeroCommande'));
    }

    public function rappels()
    {
        // Logique spécifique pour la page des rappels (si nécessaire)
        return view('rappels'); // Retourne la vue 'rappels.blade.php'
    }

    public function creations()
    {
        // Logique spécifique pour la page des créations (si nécessaire)
        return view('creationObjets '); // Retourne la vue 'creations.blade.php'
    }

    public function profil()
    {
        // Logique spécifique pour la page du profil (si nécessaire)
        return view('profil'); // Retourne la vue 'profil.blade.php'
    }

    public function statistiques()
    {
        // Logique spécifique pour la page des statistiques (si nécessaire)
        return view('statistiques'); // Retourne la vue 'statistiques.blade.php'
    }

    public function historiques()
    {
        // Logique spécifique pour la page des historiques (si nécessaire)
        return view('historiques'); // Retourne la vue 'historiques.blade.php'
    }
}