<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;
    protected $fillable = ['etoiles', 'avis', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
