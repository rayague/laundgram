<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Objet;
use App\Models\Retrait;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Twilio\Rest\Client;

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

public function show($id)
{
    // Trouver la commande par son ID
    // $commande = Commande::findOrFail($id);
    $commande = Commande::with('objets')->findOrFail($id);


    // Passer la commande à la vue
    return view('commandesDetails', compact('commande'));
}


public function retirerObjet(Request $request, Commande $commande, Objet $objet)
{
    // Vérifier si l'objet est bien lié à la commande
    $pivotRow = $commande->objets()->where('objet_id', $objet->id)->first();
    if (!$pivotRow) {
        return back()->with('error', 'L\'objet n\'est pas lié à cette commande.');
    }

    // Récupérer la quantité disponible via le pivot (en s'assurant d'utiliser withPivot('quantite') dans le modèle)
    $quantiteDisponible = $pivotRow->pivot->quantite ?? 0;

    // Validation de la quantité à retirer
    $request->validate([
        'quantite_retirer' => [
            'required',
            'integer',
            'min:1',
            'max:' . $quantiteDisponible,
        ],
    ]);

    // Récupérer la quantité à retirer
    $quantiteRetirer = $request->input('quantite_retirer');

    // Calcul de la nouvelle quantité
    $nouvelleQuantite = $quantiteDisponible - $quantiteRetirer;

    // Si la nouvelle quantité est négative (par sécurité), on retourne une erreur
    if ($nouvelleQuantite < 0) {
        return back()->with('error', 'La quantité à retirer dépasse la quantité disponible.');
    }

    // Mise à jour dans la base de données : soit mise à jour du pivot, soit détachement si zéro
    if ($nouvelleQuantite > 0) {
        $commande->objets()->updateExistingPivot($objet->id, ['quantite' => $nouvelleQuantite]);
    } else {
        $commande->objets()->detach($objet->id);
    }

    // Enregistrer les détails du retrait dans la table 'retraits'
    Retrait::create([
        'commande_id'     => $commande->id,
        'objet_id'        => $objet->id,
        'user_id'         => Auth::user()->id, // Utilisation du Facade Auth
        'quantite_retirer'=> $quantiteRetirer,
        'retrait_at'      => now(),
    ]);


    // Retourner un message de succès
    return redirect()->route('commandes.show', $commande->id)
        ->with('success', 'Quantité retirée avec succès. ' . ($nouvelleQuantite == 0 ? 'Produit complètement retiré.' : ''));
}

public function sendWhatsapp($commandeId)
{
    $commande = Commande::findOrFail($commandeId);
    $pdf = PDF::loadView('commandes.facture', compact('commande'))->output();

    $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

    $message = $twilio->messages->create(
        'whatsapp:' . $commande->numero_whatsapp, // Le numéro WhatsApp du client
        [
            'from' => 'whatsapp:+14155238886', // Numéro WhatsApp Twilio
            'body' => 'Voici votre facture de commande #'.$commande->numero,
            'mediaUrl' => [env('PDF_UPLOAD_URL') . '/facture_commande_'.$commande->numero.'.pdf'],
        ]
    );

    return back()->with('success', 'Facture envoyée avec succès !');
}

public function sendFacturePdf($commandeId)
{
    $commande = Commande::with('retraits')->findOrFail($commandeId);

    $pdf = PDF::loadView('commandes.facture', compact('commande'));

    return $pdf->download('facture_commande_'.$commande->numero.'.pdf');
}



}