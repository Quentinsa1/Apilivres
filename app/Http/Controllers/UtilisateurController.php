<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    // Récupérer tous les utilisateurs
    public function index()
    {
        return Utilisateur::all();  // Récupère tous les utilisateurs
    }

    // Créer un nouvel utilisateur
    // Créer un nouvel utilisateur
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'matricule' => 'required|unique:utilisateurs,matricule',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'mot_passe' => 'required|string',
            'filiere' => 'required|string',
            'niveau' => 'required|integer',
            'telephone' => 'required|string',
            'type' => 'required|string',
            'cover' => 'nullable|string',
        ]);

        try {
            $utilisateur = Utilisateur::create($validatedData);
            return response()->json($utilisateur, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de créer l\'utilisateur. Veuillez réessayer plus tard.'], 500);
        }
    }



    // Récupérer un utilisateur spécifique par ID
    public function show($id)
    {
        // Trouver l'utilisateur par son ID
        return Utilisateur::findOrFail($id);
    }

    // Mettre à jour un utilisateur spécifique
    public function update(Request $request, $id)
    {
        // Trouver l'utilisateur à mettre à jour
        $utilisateur = Utilisateur::findOrFail($id);

        // Mettre à jour les données
        $utilisateur->update($request->all());

        return response()->json($utilisateur, 200);
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        // Supprimer l'utilisateur
        Utilisateur::destroy($id);

        return response()->json(null, 204);
    }
}
