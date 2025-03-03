<?php

namespace App\Http\Controllers;

use App\Models\Objets;
use App\Models\Objects;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
      // Enregistrer l'objet
      public function store(Request $request)
      {
          $request->validate([
              'nom' => 'required|string|max:255',
            //   'description' => 'required|string|max:10000',
              'prix_unitaire' => 'required|numeric|min:0',
          ]);

          try {
              // Création de l'objet
              Objets::create([
                  'nom' => $request->nom,
                //   'description' => $request->description,
                  'prix_unitaire' => $request->prix_unitaire,
              ]);

                 // Message de succès
                 session()->flash('success', 'L\'objet a été créé avec succès !');
              } catch (\Exception $e) {
                  // Message d'erreur
                  session()->flash('error', 'Une erreur est survenue. Veuillez réessayer.');
              }


          return redirect()->route('creationObjets');
      }

      public function objetsList()
  {
      // Récupérer tous les objets, triés par date de création décroissante
      $objets = Objets::latest()->get(); // ou ->orderBy('created_at', 'desc')

      // Retourner la vue avec les objets
      return view('administrateur.listeObjets', compact('objets'));
  }
}