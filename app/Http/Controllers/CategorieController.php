<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategorieController extends Controller
{

 public function index()
{
    // Récupère toutes les catégories
    $categories = Categories::all(); // ou Categories::orderBy('nom_cat')->get() pour trier

    // Passe les catégories à la vue
    return view('pages.categorie', compact('categories')); // <-- ici pages.
}

    // Méthode store pour enregistrer une catégorie
    public function store(Request $request)
    {
        //  Validation du formulaire
       $request->validate([
        'nom' => 'required|string|max:255|unique:categories,nom_cat',
    ], [
        'nom.required' => 'Le champ Nom de la catégorie est obligatoire.', // champ vide
        'nom.unique' => 'Cette catégorie existe déjà.', // nom déjà utilisé
        'nom.string' => 'Le nom doit être une chaîne de caractères.',
        'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
    ]);

        // Enregistrement dans la base
        Categories::create([
            'nom_cat' => $request->nom,
        ]);

        // Redirection avec message
         return redirect()->route('categories.index')->with('success', 'Catégorie enregistrée avec succès !');
    }
}
