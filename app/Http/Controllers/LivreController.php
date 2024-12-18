<?php
namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    // Liste tous les livres
    public function index()
    {
        return response()->json(Livre::all(), 200);
    }

    // Crée un nouveau livre
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'rate' => 'required|integer|min:0|max:10',
            'maison_edition' => 'nullable|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
        ]);

        // Création du livre
        $livre = Livre::create($validated);

        // Retourner une réponse
        return response()->json($livre, 201); // Code 201 : Created
    }


    // Affiche un livre spécifique
    public function show($id)
    {
        $livre = Livre::find($id);

        if (!$livre) {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }

        return response()->json($livre, 200);
    }

    // Met à jour un livre
    public function update(Request $request, $id)
    {
        $livre = Livre::find($id);

        if (!$livre) {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }

        $livre->update($request->all());
        return response()->json($livre, 200);
    }

    // Supprime un livre
    public function destroy($id)
    {
        $livre = Livre::find($id);

        if (!$livre) {
            return response()->json(['message' => 'Livre non trouvé'], 404);
        }

        $livre->delete();
        return response()->json(['message' => 'Livre supprimé'], 200);
    }
}

