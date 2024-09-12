<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'lieu_prise',
        'date_location',
        'heure_location',
        'lieu_retour',
        'date_retour',
        'heure_retour',
        'etat',
        'montant'
    ];
    public function conducteur()
    {
        return $this->belongsTo(Conducteur::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }
    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
    public function supplements()
    {
        return $this->belongsToMany(
            Supplement::class,
            'reservation_supplements'
        )->withPivot('quantite', 'montant');
    }
}
