<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'marque_modele',
        'annee_fabrication',
        'etat',
        'type_transmission',
        'type_carburant',
        'categorie',
        'nb_portes',
        'nb_places',
        'capacite_coffre',
        'description',
        'image',
        'disponibilite',
        'prix',
        'user_id',
        'voiture_id',
        'vol_id'
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
