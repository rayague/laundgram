<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

public function index()
{
    $users = User::all(); // Récupérer tous les utilisateurs
    return view('administrateur.utilisateurs', compact('users')); // Passer les utilisateurs à la vue
}

public function create()
{
    return view('administrateur.create');  // Afficher la vue avec le formulaire
}

public function profilAdmin()
{
    return view('administrateur.profileAdmin');  // Afficher la vue avec le formulaire
}


public function destroy($id)
{
    $user = User::findOrFail($id);  // Trouver l'utilisateur par son ID
    $user->delete();  // Supprimer l'utilisateur

    // Rediriger vers la liste des utilisateurs avec un message de succès
    return redirect()->route('utilisateurs')->with('success', 'Utilisateur supprimé avec succès');
}

public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Assurez-vous que le mot de passe est confirmé
        ]);

        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();  // Sauvegarder dans la base de données

        // Rediriger avec un message de succès
        return redirect()->route('utilisateurs')->with('success', 'Utilisateur créé avec succès.');
    }

}