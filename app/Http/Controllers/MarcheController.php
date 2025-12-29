<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marche;

class MarcheController extends Controller
{
   public function create() {
    return view('pages.marches');
}


    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload de la photo si elle existe
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos_marches', 'public');
        }

        // Création du marché
        Marche::create([
            'nom_march' => $request->nom,
            'emplacement' => $request->adresse,
            'description' => $request->description,
            'photo' => $photoPath,
        ]);

        return redirect()->route('marches.index')->with('success', 'Marché ajouté avec succès !');
    }
}
