<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule', 'nom', 'prenom', 'mot_passe', 'filiere', 'niveau',
        'telephone', 'type', 'cover',
    ];
// Dans le modèle Utilisateur
protected $primaryKey = 'matricule';

    // Si vous voulez gérer les mots de passe de manière sécurisée
    public function setMotPasseAttribute($value)
    {
        $this->attributes['mot_passe'] = bcrypt($value);
    }
     // Relation avec Reservation
     public function reservations()
     {
         return $this->hasMany(Reservation::class, 'matricule', 'matricule');
     }
}
