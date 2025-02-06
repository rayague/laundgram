<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
    public function index()
    {
        // Récupérer les horaires existants
        $horaire = Horaire::first();
        return view('dashboard', compact('horaire'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monday_to_friday_start' => 'required|string',
            'monday_to_friday_end' => 'required|string',
            'saturday_start' => 'nullable|string',
            'saturday_end' => 'nullable|string',
            'sunday' => 'nullable|string',
        ]);

        // Définir des valeurs par défaut si les champs sont vides
        $data = $request->only([
            'monday_to_friday_start',
            'monday_to_friday_end',
            'saturday_start',
            'saturday_end',
            'sunday',
        ]);

        // Valeurs par défaut si non fournies
        $data['saturday_start'] = $data['saturday_start'] ?? '08:00:00';
        $data['saturday_end'] = $data['saturday_end'] ?? '18:00:00';
        $data['sunday'] = $data['sunday'] ?? 'Fermé';

        // Mise à jour ou création de l'horaire
        $horaire = Horaire::updateOrCreate(
            ['id' => 1], // Si un horaire existe déjà, on le met à jour, sinon on en crée un nouveau
            $data
        );

        return redirect()->route('horaires.index', compact('horaire'))->with('success', 'Les horaires ont été enregistrés avec succès.');
    }
}