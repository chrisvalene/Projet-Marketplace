<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ComptesController extends Controller
{
     // Affiche la page de connexion
    public function showLoginForm()
    {
        return view('pages.login'); // Affiche la page de login
    }

    // Gère la logique de connexion
    public function login(Request $request)
    {
        // Validation des entrées
    $zone =     $request->validate([
            'email' => 'required_without:telephone|email', // Si téléphone n'est pas renseigné, alors l'email est requis
            'password' => 'required', // Mot de passe obligatoire
        ]);

        // Recherche de l'utilisateur par email OU téléphone
        $user = User::where('email', $request->email);

        // Si l'utilisateur existe
        if ($user && Auth::attempt([
            'email' => $request->email ?: $user->email, // Si l'email est vide, on utilise celui de l'utilisateur trouvé
            'password' => $request->password
        ])) {

            // Rediriger en fonction du rôle de l'utilisateur
           if(Auth::attempt($zone)){
            $request->session()->regenerate();
            $user = Auth::user();


            return match($user->role){
                'admin' => redirect()->route('tab_bord_admin'),
                 'vendeur' => redirect()->route('tab_bord_vend'),
                  default => redirect()->route('tab_bord_admin'),
            };

            return back()->withErrors([
              'email'=>'Identifiants incorrecte',
            ]);
           }



        }

        // Si l'authentification échoue, rediriger avec erreur
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.'
        ]);
    }

}
