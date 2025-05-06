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
        Schema::create('formulaire_contact', function (Blueprint $table) {
            $table->id(); // Crée un champ auto-incrémenté appelé 'id'
            $table->string('nom'); // Champ pour stocker le nom
            $table->string('prenom'); // Champ pour stocker le prénom
            $table->string('tel', 15); // Champ pour stocker le numéro de téléphone
            $table->string('email'); // Champ pour stocker l'email
            $table->text('message'); // Champ pour stocker le message
            $table->timestamps(); // Ajoute automatiquement les colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaire_contact'); // Supprime la table si elle existe
    }
};
