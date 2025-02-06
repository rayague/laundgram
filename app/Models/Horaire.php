<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horaire extends Model
{

    use HasFactory;
    protected $fillable = [
        'monday_to_friday_start',
        'monday_to_friday_end',
        'saturday_start',
        'saturday_end',
        'sunday',
    ];
}