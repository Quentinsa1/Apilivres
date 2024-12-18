<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Récupérer toutes les réservations
    public function index()
    {
        return response()->json(Reservation::with(['utilisateur', 'livre'])->get());
    }

    // Créer une nouvelle réservation
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|exists:utilisateurs,matricule',
            'id_livre' => 'required|exists:livre,id',
            'date_reservation' => 'required|date',
            'date_emprunt' => 'nullable|date',
            'date_retour' => 'nullable|date',
            'is_loan' => 'boolean',
            'livre_rendu' => 'boolean',
            'status' => 'nullable|string',
            'is_reservation' => 'boolean',
        ]);

        $reservation = Reservation::create($request->all());

        return response()->json($reservation, 201);
    }

    // Récupérer une réservation spécifique par ID
    public function show($id)
    {
        $reservation = Reservation::with(['utilisateur', 'livre'])->findOrFail($id);
        return response()->json($reservation);
    }

    // Mettre à jour une réservation
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return response()->json($reservation, 200);
    }

    // Supprimer une réservation
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(null, 204);
    }
}
