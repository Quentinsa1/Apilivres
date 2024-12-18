<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations'; // Correction ici, au pluriel
    protected $fillable = [
        'matricule',
        'id_livre',
        'date_reservation',
        'date_emprunt',
        'date_retour',
        'is_loan',
        'livre_rendu',
        'status',
        'is_reservation',
    ];

    // Relier la réservation à un utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'matricule', 'matricule');
    }

    // Relier la réservation à un livre
    public function livre()
    {
        return $this->belongsTo(Livre::class, 'id_livre', 'id');
    }
}

