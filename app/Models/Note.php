<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'commande_id',
        'user_id',
        'note',
        'commande_details',
    ];

    // Si besoin, vous pouvez définir les casts
    protected $casts = [
        'commande_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}