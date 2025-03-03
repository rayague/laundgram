<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentifier l'utilisateur avec les identifiants (email et mot de passe)
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regénérer la session après une connexion réussie
            $request->session()->regenerate();

            // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Vérification par email pour redirection
            if ($user->email === 'abdullah@laundgram.com') {
                // Redirection vers le dashboard de l'admin
                return redirect()->route('administration');
            }

            // Si l'email est différent, redirection vers le tableau de bord par défaut
            return redirect()->route('dashboard');
        }

        // Si la connexion échoue, rediriger avec un message d'erreur
        return back()->withErrors(['email' => 'Identifiants incorrects.']);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}