<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ConnexionController extends Controller
{
    // Affiche la page de connexion
    public function showLoginForm()
    {
        return view('auth.login'); // Affiche la page de login
    }

    // Gère la logique de connexion
    public function login(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'email' => 'required_without:telephone|email', // Si téléphone n'est pas renseigné, alors l'email est requis
            'telephone' => 'required_without:email|numeric', // Si email n'est pas renseigné, alors le téléphone est requis
            'password' => 'required', // Mot de passe obligatoire
        ]);

        // Recherche de l'utilisateur par email OU téléphone
        $user = User::where('email', $request->email)
                    ->orWhere('telephone', $request->telephone)
                    ->first();

        // Si l'utilisateur existe
        if ($user && Auth::attempt([
            'email' => $request->email ?: $user->email, // Si l'email est vide, on utilise celui de l'utilisateur trouvé
            'telephone' => $request->telephone ?: $user->telephone, // Idem pour téléphone
            'password' => $request->password
        ])) {

            // Rediriger en fonction du rôle de l'utilisateur
            if ($user->role && $user->role->nom === 'vendeur') {
                // Si l'utilisateur est un vendeur, rediriger vers son tableau de bord
                return redirect()->route('vendeur.dashboard');
            } elseif ($user->role && $user->role->nom === 'acheteur') {
                // Si l'utilisateur est un acheteur, rediriger vers la page principale
                return redirect()->route('index');
            } else {
                // Si c'est un autre type de rôle, rediriger vers le tableau de bord admin
                return redirect()->route('admin.dashboard');
            }
        }

        // Si l'authentification échoue, rediriger avec erreur
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.'
        ]);
    }

  
}
