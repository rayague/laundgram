<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'client', 'numero_whatsapp', 'date_depot', 'date_retrait', 'heure_retrait', 'type_lavage', 'emplacement'
    ];

    // Relation avec les objets (une commande peut avoir plusieurs objets)
    public function objets()
    {
        return $this->belongsToMany(Objet::class)->withPivot('quantite')->withTimestamps();
    }
}