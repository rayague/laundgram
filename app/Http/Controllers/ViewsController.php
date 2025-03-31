<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Note;
use App\Models\Objets;
use App\Models\Objects;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CommandePayment;
use Illuminate\Support\Facades\Auth;

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



    // public function rappels()
    // {
    //     $today = Carbon::today()->toDateString();
    //     $commandes = Commande::whereDate('date_retrait', $today)
    //                     ->with(['objets', 'user']) // charger les relations si nécessaire
    //                     ->get();

    //     return view('utilisateurs.rappels', compact('commandes'));
    // }


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
        return view('utilisateurs.detailsRetraits', );
    }

    public function enAttente()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Définir la date d'aujourd'hui au format 'YYYY-MM-DD'
        $today = Carbon::today()->toDateString();

        // Récupérer toutes les commandes de l'utilisateur dont la date de retrait est aujourd'hui
        $commandes = Commande::where('user_id', $user->id)
            ->whereDate('date_retrait', $today)
            ->get();

        // Passer les commandes à la vue 'utilisateurs.pending'
        return view('utilisateurs.pending', compact('commandes'));
    }

    public function comptabilite()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();

        // Vérifier si la commande existe et si l'utilisateur connecté a accès
        $commande = Commande::where('user_id', $userId)->get(); // Filtrer les commandes par l'utilisateur connecté

        // Si la commande n'existe pas pour cet utilisateur, on redirige ou on renvoie une erreur
        if ($commande->isEmpty()) {
            return redirect()->route('dashboard')->with('error', 'Aucune commande trouvée pour cet utilisateur.');
        }

        // Récupérer les paiements associés à cet utilisateur
        $payments = CommandePayment::where('user_id', $userId)->get();

        // Récupérer les notes associées à cet utilisateur
        $notes = Note::where('user_id', $userId)->get();

        // Retourner la vue avec les données
        return view('utilisateurs.comptabilite', compact('commande', 'payments', 'notes', 'userId'));
    }




    public function rappels($commandeId = null)
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();

        if ($commandeId) {
            // Vérifier que la commande est validée et appartient à l'utilisateur connecté
            $commandes = Commande::where('id', $commandeId)
                ->where('statut', 'validée') // Statut validé
                ->where('user_id', $userId) // Vérifier que l'utilisateur est bien celui connecté
                ->with('objets') // Charger la relation objets si nécessaire
                ->get();

            // Récupérer les notes associées à cette commande
            $notes = Note::where('commande_id', $commandeId)
                ->with('user') // Récupérer l'utilisateur associé à la note
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Récupérer les commandes validées pour l'utilisateur connecté
            $commandes = Commande::where('statut', 'validée')
                ->where('user_id', $userId)
                ->get();

            // Récupérer toutes les notes de l'utilisateur connecté
            $notes = Note::where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // Retourner la vue avec les données
        return view('utilisateurs.rappels', compact('commandes', 'notes'));
    }


    public function pageRetrait(Commande $commande)
    {
        return view('utilisateurs.faireRetrait', [
            'commande' => $commande
        ]);
    }






}
