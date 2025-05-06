<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('info_pdfs', function (Blueprint $table) {
            $table->id(); // Crée un champ auto-incrémenté appelé 'id'
            $table->string('numero'); // Champ pour stocker le numéro
            $table->string('immatriculation_RDC'); // Champ pour stocker l'immatriculation RDC
            $table->string('date_immatriculation'); // Champ pour stocker la date d'immatriculation
            $table->string('denomination_raison_sociale'); // Champ pour stocker la dénomination ou la raison sociale
            $table->string('forme_juridique'); // Champ pour stocker la forme juridique
            $table->string('capital_social'); // Champ pour stocker le capital social
            $table->string('adresse_siege'); // Champ pour stocker l'adresse du siège
            $table->string('duree_personne_morale'); // Champ pour stocker la durée de la personne morale
            $table->string('date_cloture_exercice_social'); // Champ pour stocker la date de clôture de l'exercice social
            $table->string('nom'); // Champ pour stocker le nom
            $table->string('prenoms'); // Champ pour stocker les prénoms
            $table->string('date_naissance'); // Champ pour stocker la date de naissance
            $table->string('lieu_naissance'); // Champ pour stocker le lieu de naissance
            $table->string('nationalite'); // Champ pour stocker la nationalité
            $table->string('domicile_personnel'); // Champ pour stocker le domicile personnel
            $table->string('adresse_etablissement'); // Champ pour stocker l'adresse de l'établissement
            $table->string('nom_commercial'); // Champ pour stocker le nom commercial
            $table->text('activites_exercees'); // Champ pour stocker les activités exercées
            $table->string('date_commencement_activite'); // Champ pour stocker la date de commencement d'activité
            $table->string('origine_fonds_activite'); // Champ pour stocker l'origine des fonds d'activité
            $table->string('mode_exploitation'); // Champ pour stocker le mode d'exploitation
            $table->string('devise'); // Champ pour stocker la devise
            $table->timestamps(); // Ajoute automatiquement les colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_pdf'); // Supprime la table si elle existe
    }
};
