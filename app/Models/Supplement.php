<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'libelle', 'prix', 'nbMax'];
    public function reservations()
    {
        return $this->belongsToMany(
            Reservation::class,
            'reservation_supplements'
        )->withPivot('quantite', 'montant');
    }
}
