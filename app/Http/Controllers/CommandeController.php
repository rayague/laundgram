<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Objet;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function create()
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


    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'client' => 'required|string',
            'numero_whatsapp' => 'required|string',
            'date_retrait' => 'required|date',
            'heure_retrait' => 'required|date_format:H:i',
            'type_lavage' => 'required|string',
            'emplacement' => 'required|string',
            'objets.*.id' => 'required|exists:objets,id',
            'objets' => 'required|array',
            'objets.*.quantite' => 'required|integer|min:1',

        ]);

        // Enregistrer la commande
        $commande = Commande::create([
            'numero' => $request->numero,
            'client' => $request->client,
            'numero_whatsapp' => $request->numero_whatsapp,
            'date_depot' => Carbon::now()->toDateString(),
            'date_retrait' => $request->date_retrait,
            'heure_retrait' => $request->heure_retrait,
            'type_lavage' => $request->type_lavage,
            'emplacement' => $request->emplacement,
        ]);

        // Associer les objets à la commande
        foreach ($request->objets as $objet) {
            $commande->objets()->attach($objet['id'], ['quantite' => $objet['quantite']]);
        }

        return redirect()->route('commandes')->with('success', 'Commande validée avec succès!');
    }

    public function index()
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

    public function listeCommandes()

{
    $commandes = Commande::all();  // Ou avec la pagination : Commande::paginate(10);
    $objets = Objet::all();
    return view('listeCommandes', compact('commandes','objets'));
}
}