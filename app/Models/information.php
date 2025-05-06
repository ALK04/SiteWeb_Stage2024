<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;

    protected $fillable = [
        'heure_achat',
        'nom_entreprise',
        'email_acheteur',
    ];
}
