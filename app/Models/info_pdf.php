<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info_pdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'immatriculation_RDC',
        'date_immatriculation',
        'denomination_raison_sociale',
        'forme_juridique',
        'capital_social',
        'adresse_siege',
        'duree_personne_morale',
        'date_cloture_exercice_social',
        'nom',
        'prenoms',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        'domicile_personnel',
        'adresse_etablissement',
        'nom_commercial',
        'activites_exercees',
        'date_commencement_activite',
        'origine_fonds_activite',
        'mode_exploitation',
        'devise',
    ];
}
