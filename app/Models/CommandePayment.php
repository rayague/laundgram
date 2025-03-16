<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandePayment extends Model
{
    use HasFactory;


    protected $fillable = [
        'commande_id',
        'user_id',
        'amount',
        'payment_method',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}