<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;
    protected $fillable = ['numero_vol', 'horaire_vol'];
    /*public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }*/
}
