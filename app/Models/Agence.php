<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agence extends Model
{
    use HasFactory;

    // Les attributs que l'on peut remplir via le formulaire
    protected $fillable = [
        'nom',
        'responsable_nom',
        'responsable_tel',
        'adresse',
        'specification',
        'rccm',
        'ifu',
    ];
}
