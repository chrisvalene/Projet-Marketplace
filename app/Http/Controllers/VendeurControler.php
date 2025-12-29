<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendeur;
use App\Models\Marche;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class VendeurControler extends Controller
{
            public function dashboard() {
            return view('pages.tab_bord_vend');
        }

    public function create()
    {
        $marches = Marche::all();
        return view('pages.vendeur', compact('marches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|string|min:6',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'marche_id' => 'required|exists:marches,id',
        ]);

        $roleVendeur = Role::where('nom_role', 'vendeur')->first();

        // Créer l'utilisateur avec id_role
        $user = User::create([
            'nom_utilisateur' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'id_role' => $roleVendeur->id, // OK si la colonne existe
        ]);

        // Créer le vendeur lié à l'utilisateur
        Vendeur::create([
            'id_utilisateur' => $user->id,
            'id_march' => $request->marche_id,
        ]);

        return redirect()->route('pages.create')->with('success', 'Vendeur enregistré avec succès !');
    }
}
