<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'gendre',
        'nom',
        'prenom',
        'email',
        'mdp',
        'telephone',
        'date_naissance',
        'date_permis'
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
