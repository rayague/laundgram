<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function acceuil()
    {
        // Logique spécifique pour la page des commandes (si nécessaire)
        return view('dashboard'); // Retourne la vue 'commandes.blade.php'
    }
    public function commandes()
    {
        // Logique spécifique pour la page des commandes (si nécessaire)
        return view('commandes'); // Retourne la vue 'commandes.blade.php'
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