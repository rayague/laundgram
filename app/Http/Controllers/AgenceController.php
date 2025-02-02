<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
      // Méthode pour afficher le formulaire de modification
      public function edit()
      {
          $agence = Agence::first(); // Supposons que tu as une seule agence pour la simplification
          return view('agence.edit', compact('agence'));
      }

      // Méthode pour traiter la soumission du formulaire
      public function update(Request $request)
      {
          // Validation des données
          $request->validate([
              'nom_agence' => 'required|string|max:255',
              'responsable_nom' => 'required|string|max:255',
              'responsable_tel' => 'required|string|max:20',
              'adresse_agence' => 'required|string|max:255',
              'specification' => 'nullable|string|max:255',
              'rccm' => 'required|string|max:50',
              'ifu' => 'required|string|max:50',
          ]);

          // Trouver l'agence à modifier (nous supposons qu'il n'y en a qu'une ici)
          $agence = Agence::first(); // Ou Agence::findOrFail($id);

          // Mise à jour des informations
          $agence->update([
              'nom' => $request->nom_agence,
              'responsable_nom' => $request->responsable_nom,
              'responsable_tel' => $request->responsable_tel,
              'adresse' => $request->adresse_agence,
              'specification' => $request->specification,
              'rccm' => $request->rccm,
              'ifu' => $request->ifu,
          ]);

          // Retourner un message de succès
          return redirect()->route('profil')
              ->with('success', 'Les informations de l\'agence ont été mises à jour.');
      }

      public function modificationAgence(){
       return  view('modifierAgence');
      }
}