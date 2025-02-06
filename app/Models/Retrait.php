<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retrait extends Model
{
    protected $fillable = [
        'commande_id',
        'objet_id',
        'user_id',
        'quantite_retirer',
        'retrait_at',
    ];
}