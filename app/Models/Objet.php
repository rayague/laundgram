<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objet extends Model
{
    use HasFactory;

    // Attributs que l'on peut remplir via le formulaire (Protection contre les assignations massives)
    protected $fillable = [
        'nom',
        'description',
        'prix_unitaire',
    ];

}
