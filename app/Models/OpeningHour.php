<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpeningHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'day', 'start_time', 'end_time', 'status',
    ];
}