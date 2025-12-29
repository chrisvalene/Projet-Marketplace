<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AcheteurController extends Controller
{
//    public function create()
//     {
//         $marches = Marche::all();
//         return view('pages.inst_vend', compact('marches'));
//     }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|string|min:6',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ]);

        $roleVendeur = Role::where('nom_role', 'achetteur')->first();

        // Créer l'utilisateur avec id_role
        $user = User::create([
            'nom_utilisateur' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'id_role' => $roleVendeur->id, // OK si la colonne existe
        ]);

    Auth::login($user);
        return redirect()->route('index')->with('success', 'Acheteur enregistré avec succès !');
    }
}
