<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'auteur',
        'rate',
        'maison_edition',
        'categorie',
        'cover',
    ];

    // Relation avec Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_livre', 'id');
    }
}
