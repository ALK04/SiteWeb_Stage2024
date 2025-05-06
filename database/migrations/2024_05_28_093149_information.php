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
        Schema::create('information', function (Blueprint $table) {
            $table->id(); // Crée un champ auto-incrémenté appelé 'id'
            $table->string('heure_achat');
            $table->string('nom_entreprise');
            $table->string('email_acheteur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information'); // Supprime la table si elle existe
    }
};

