<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{

    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'client',
    //     'numero_whatsapp',
    //     'numero',
    //     'date_depot',
    //     'date_retrait',
    //     'heure_retrait',
    //     'statut',
    //     'avance_client',
    //     'total',
    //     'solde_restant',
    //     'remise_reduction',
    //     'type_lavage',
    // ];

    protected $fillable = [
        'user_id',
        'numero',
        'client',
        'numero_whatsapp',
        'date_depot',
        'date_retrait',
        'heure_retrait',
        'type_lavage',
        'emplacement',
        'montant_remis',
        'total',
        'avance_client',
        'solde_restant',
        'statut',
        'cout_total_commande',
        'reste_a_payer',
        'original_total',
        'discount_amount',
        'remise_reduction'
    ];

    // // Relation many-to-many avec Objets
    public function objets()
    {
        return $this->belongsToMany(Objets::class, 'commande_objets', 'commande_id', 'objet_id')
            ->withPivot('quantite', 'description')
            ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(CommandePayment::class);
    }

    public function getTotalPaymentsAttribute()
    {
        return $this->payments()->sum('amount');
    }


}
