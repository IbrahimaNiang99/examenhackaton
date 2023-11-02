<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere',
        'duree',
        'etat',
        'id_prof',
        'photo',
        'description',
    ];

    public function prof()
    {
        return $this->belongsTo(Professeur::class, 'id_prof');
    }
}
