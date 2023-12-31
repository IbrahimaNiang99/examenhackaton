<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'adresseur',
        'email',
        'etat',
    ];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}
