<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formulaire_contact extends Model
{
    use HasFactory;

    protected $table = 'formulaire_contacts';
    protected $fillable = [
        'nom',
        'prenom',
        'tel',
        'email',
        'message',
    ];
}
