<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Note;
use App\Models\Objets;
use App\Models\Objects;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommandePayment;

class CommandeController extends Controller
{
    public function create()
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
        return view('utilisateurs.commandes', compact('objets', 'numeroCommande'));
    }



    public function store(Request $request)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer une commande.');
        }

        // Validation des données
        $request->validate([
            'client' => 'required|string',
            'numero_whatsapp' => 'required|string',
            'date_retrait' => 'required|date',
            'heure_retrait' => 'required|date_format:H:i',
            'type_lavage' => 'required|string',
            'objets' => 'required|array',
            'objets.*.id' => 'required|exists:objets,id',
            'objets.*.quantite' => 'required|integer|min:1',
            'objets.*.description' => 'required|string',
            'avance_client' => 'nullable|numeric|min:0',
            'remise_reduction' => 'nullable|in:0,10,15,20,25,30,35,40,50',
        ]);

        // Générer automatiquement le numéro de facture
        $numeroCommande = 'FC-' . str_pad(Commande::count() + 1, 5, '0', STR_PAD_LEFT);

        // Création de la commande
        $commande = Commande::create([
            'user_id' => Auth::user()->id,
            'numero' => $numeroCommande,
            'client' => $request->client,
            'numero_whatsapp' => $request->numero_whatsapp,
            'date_depot' => \Carbon\Carbon::now()->toDateString(),
            'date_retrait' => $request->date_retrait,
            'heure_retrait' => $request->heure_retrait,
            'type_lavage' => $request->type_lavage,
            'avance_client' => $request->avance_client ?? 0,
            'remise_reduction' => $request->remise_reduction ?? 0,
        ]);

        // Calculer le total initial (sans réduction)
        $totalCommande = 0;
        foreach ($request->objets as $objetData) {
            $objet = Objets::find($objetData['id']);
            $quantite = $objetData['quantite'];
            $totalCommande += $objet->prix_unitaire * $quantite;
            $commande->objets()->attach($objetData['id'], [
                'quantite' => $quantite,
                'description' => $objetData['description'],
            ]);
        }

        // Conserver le total initial avant réduction
        $originalTotal = $totalCommande;

        // Calcul de la réduction
        $remiseReduction = $request->remise_reduction ?? 0;
        $discountAmount = 0;
        if ($remiseReduction > 0) {
            $discountAmount = $totalCommande * ($remiseReduction / 100);
            $totalCommande = $totalCommande - $discountAmount;
        }

        // Si le type de lavage est "Lavage express", doubler les montants
        if (strtolower($request->type_lavage) === 'lavage express') {
            $totalCommande *= 2;
            $originalTotal *= 2;
            $discountAmount *= 2;
        }

        // Calculer les informations financières
        $avanceClient = $request->avance_client ?? 0;
        $soldeRestant = max(0, $totalCommande - $avanceClient);

        // Mettre à jour la commande avec le total final et le solde restant
        $commande->update([
            'total' => $totalCommande,
            'solde_restant' => $soldeRestant,
        ]);

        // Redirection vers la page de détail de la commande en passant les données de réduction
        return redirect()->route('listeCommandes', $commande->id)
            ->with('success', 'Commande validée avec succès!')
            ->with([
                'originalTotal' => $originalTotal,
                'discountAmount' => $discountAmount,
                'remiseReduction' => $remiseReduction,
            ]);
    }


    // Dans CommandeController.php
// public function updateFinancial(Request $request, Commande $commande)
// {
//     $montantPaye = $request->input('montant_paye');

    //     // Mettre à jour l'avance du client
//     $commande->avance_client += $montantPaye;

    //     // Recalculer le solde restant
//     $commande->solde_restant = $commande->total - $commande->avance_client;

    //     // Si le solde restant est inférieur ou égal à zéro, marquer la commande comme payée
//     if ($commande->solde_restant <= 0) {
//         $commande->statut = 'Payée';
//         $commande->solde_restant = 0; // S'assurer que le solde restant ne soit pas négatif
//     }

    //     // Sauvegarder les modifications
//     $commande->save();

    //     return redirect()->back()->with('success', 'Le paiement a été mis à jour avec succès.');
// }

    public function updateFinancial(Request $request, Commande $commande)
    {
        // Vérifier que l'utilisateur connecté est bien celui qui a créé la commande
        if (Auth::id() !== $commande->user_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à mettre à jour cette commande.');
        }

        // Valider les données du formulaire
        $request->validate([
            'montant_paye' => 'required|numeric|min:0',
            'payment_method' => 'nullable|string',
        ]);

        $montantPaye = floatval($request->input('montant_paye'));
        $paymentMethod = $request->input('payment_method') ?? null;

        // Créer un enregistrement de paiement via le modèle CommandePayment
        CommandePayment::create([
            'commande_id' => $commande->id,
            'user_id' => Auth::id(),
            'amount' => $montantPaye,
            'payment_method' => $paymentMethod,
        ]);

        // Rafraîchir l'instance de commande et recharger la relation payments pour obtenir les paiements actualisés
        $commande->refresh();
        $commande->load('payments');

        // Calculer le cumul des avances versées
        $totalAvance = $commande->payments->sum('amount');

        // Mettre à jour l'avance client et recalculer le solde restant (total de la commande - cumul des avances)
        $commande->avance_client = $totalAvance;
        $commande->solde_restant = max(0, $commande->total - $totalAvance);

        // Mettre à jour le statut de la commande : "Payé" si le solde restant est 0, sinon "Partiellement payé"
        $commande->statut = ($commande->solde_restant == 0) ? 'Payé' : 'Partiellement payé';

        // Sauvegarder les modifications dans la base de données
        $commande->save();

        // Retourner un message indiquant le résultat du paiement
        if ($commande->solde_restant > 0) {
            return redirect()->back()->with('success', 'Le paiement a été mis à jour. Il manque '
                . number_format($commande->solde_restant, 2) . ' FCFA pour solder la commande.');
        } else {
            return redirect()->back()->with('success', 'La commande est entièrement payée.');
        }
    }












    public function index()
    {
        // Récupérer les objets disponibles
        $objets = Objets::all();

        // Générer un numéro de commande unique
        $annee = Carbon::now()->year;
        $prefixe = "ETS-" . $annee . "-";

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
        return view('utilisateurs.commandes', compact('objets', 'numeroCommande'));
    }

    public function listeCommandes()
    {
        $commandes = Commande::all();  // Ou avec la pagination : Commande::paginate(10);
        $objets = Objets::all();
        return view('utilisateurs.listeCommandes', compact('commandes', 'objets'));
    }

    public function show($id)
    {
        // Récupérer la commande avec ses objets associés
        $commande = Commande::with('objets')->findOrFail($id);

        // Récupérer la note relative à la commande
        $notes = Note::where('commande_id', $commande->id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        // Calcul du total initial sans réduction
        $originalTotal = 0;
        foreach ($commande->objets as $objet) {
            $originalTotal += $objet->prix_unitaire * $objet->pivot->quantite;
        }
        if (strtolower($commande->type_lavage) === 'lavage express') {
            $originalTotal *= 2;
        }

        // Récupérer le pourcentage de réduction et calculer le montant de la réduction
        $remiseReduction = (float) $commande->remise_reduction;
        $discountAmount = 0;
        if ($remiseReduction > 0) {
            $discountAmount = $originalTotal * ($remiseReduction / 100);
        }
        $finalTotal = $originalTotal - $discountAmount;

        return view('utilisateurs.commandesDetails', compact(
            'commande',
            'notes',
            'originalTotal',
            'discountAmount',
            'remiseReduction',
            'finalTotal'
        ));
    }







    public function completerPaiement(Request $request, Commande $commande)
    {
        // Validation : on s'assure que l'utilisateur fournit un montant additionnel positif
        $request->validate([
            'montant_additionnel' => 'required|numeric|min:0'
        ]);

        $montantAdditionnel = $request->input('montant_additionnel');

        // Mettre à jour le montant remis : on ajoute le montant additionnel à la valeur existante
        $nouveauMontantRemis = $commande->montant_remis + $montantAdditionnel;
        $commande->update([
            'montant_remis' => $nouveauMontantRemis,
        ]);

        // Recharger la commande avec ses objets et retraits
        $commande->load('objets', 'retraits');

        // Recalculer le coût total de la commande
        $totalCommande = $commande->objecsts->sum(function ($objet) {
            return $objet->prix_unitaire * $objet->pivot->quantite;
        });

        // Recalculer le total des retraits déjà effectués
        $totalRetraits = $commande->retraits->sum('cout');

        // Calculer les indicateurs financiers
        $soldeRestant = $nouveauMontantRemis - $totalRetraits;
        $resteAPayer = max(0, $totalCommande - $nouveauMontantRemis);

        // Mettre à jour la commande avec les nouveaux indicateurs financiers
        $commande->update([
            'cout_total_commande' => $totalCommande,
            'total_retraits' => $totalRetraits,
            'solde_restant' => $soldeRestant,
            'reste_a_payer' => $resteAPayer,
        ]);

        return redirect()->route('commandes.show', $commande->id)
            ->with('success', 'Montant additionnel enregistré. Le solde a été mis à jour.');
    }


    // Méthode pour afficher les commandes journalières
    public function journalieres(Request $request)
    {
        // Récupérer la date envoyée dans la requête, ou la date du jour par défaut
        $date = $request->input('date', now()->toDateString());

        // Filtrer les commandes selon la date de dépôt ou de retrait
        $commandes = Commande::whereDate('date_depot', $date)
            ->orWhereDate('date_retrait', $date)
            ->get();

        // Retourner la vue avec les commandes filtrées
        return view('utilisateurs.commandesJournalieres', compact('commandes', 'date'));
    }

    public function valider($id)
    {
        // Récupérer la commande
        $commande = Commande::findOrFail($id);

        // Mettre à jour le statut de la commande
        $commande->update([
            'statut' => 'Validée', // Vous pouvez changer cette valeur selon vos besoins
        ]);

        // Rediriger vers la page précédente avec un message de succès
        return redirect()->back()->with('success', 'La facture a été validée avec succès.');
    }




}