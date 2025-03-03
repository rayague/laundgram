<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objets extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix_unitaire',
    ];

    // Relation many-to-many avec Commande
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_objets')  // Nom de la table pivot corrigé
            ->withPivot('quantite')
            ->withTimestamps();
    }
}