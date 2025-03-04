<?php

namespace App\Http\Controllers;

use App\Models\Note;
// use Barryvdh\DomPDF\PDF;
use App\Models\Commande;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class FactureController extends Controller
{

    public function print($id)
    {
        // Récupérer la commande avec ses objets associés
        $commande = Commande::with('objets')->findOrFail($id);

        // Calculer le total sans réduction
        $originalTotal = $commande->objets->sum(function($objet) {
            return $objet->pivot->quantite * $objet->prix_unitaire;
        });

        // Récupérer le pourcentage de réduction (assurez-vous que la colonne s'appelle bien 'remise' ou 'remise_reduction' dans votre base)
        $remiseReduction = $commande->remise_reduction ?? 0;

        // Calculer le montant de la réduction
        $discountAmount = ($originalTotal * $remiseReduction) / 100;

        // Générer le PDF en utilisant la vue 'utilisateurs.factures'
        $pdf = Pdf::loadView('utilisateurs.preview', compact('commande', 'originalTotal', 'remiseReduction', 'discountAmount'));

        // Retourner le PDF pour affichage inline
        return $pdf->stream('facture_' . $commande->numero . '.pdf');
    }

    protected function generatePdf($id)
    {
        $commande = Commande::with('objets')->findOrFail($id);

        $originalTotal = $commande->objets->sum(function($objet) {
            return $objet->pivot->quantite * $objet->prix_unitaire;
        });

        $remiseReduction = $commande->remise_reduction ?? 0;
        $discountAmount = ($originalTotal * $remiseReduction) / 100;

        // Générer le PDF en utilisant la vue 'utilisateurs.factures'
        return Pdf::loadView('utilisateurs.factures', compact('commande', 'originalTotal', 'remiseReduction', 'discountAmount'));
    }

    public function stream($id)
    {
        $pdf = $this->generatePdf($id);
        return $pdf->stream('facture_' . $id . '.pdf');
    }

    public function download($id)
    {
        $pdf = $this->generatePdf($id);
        return $pdf->download('facture_' . $id . '.pdf');
    }

    // La méthode print initiale peut rediriger vers la page de prévisualisation
    // public function print($id)
    // {
    //     // Afficher la vue de prévisualisation qui contient l'iframe
    //     $commande = Commande::findOrFail($id);
    //     return view('factures.preview', compact('commande'));
    // }

    public function storeNote(Request $request, $commande_id)
    {
        // Validation du champ note
        $request->validate([
            'note' => 'required|string',
        ]);

        // Récupérer la commande avec ses informations
        $commande = Commande::with('objets')->findOrFail($commande_id);
        $user = Auth::user();

        // Préparer un tableau avec des détails importants de la commande
        $commandeDetails = [
            'numero'            => $commande->numero,
            'client'            => $commande->client,
            'numero_whatsapp'   => $commande->numero_whatsapp,
            'date_depot'        => $commande->date_depot,
            'date_retrait'      => $commande->date_retrait,
            'total'             => $commande->total,
            // Vous pouvez ajouter d'autres informations si nécessaire
        ];

        // Enregistrer la note dans la table 'notes'
        $note = Note::create([
            'commande_id'       => $commande->id,
            'user_id'           => $user->id,
            'note'              => $request->input('note'),
            'commande_details'  => $commandeDetails, // Grâce au cast, l'array sera converti en JSON
        ]);

        return redirect()->route('commandes.show', $commande->id)->with('note', $note);
    }



}