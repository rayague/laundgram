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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('numero'); // Numéro de la commande
            $table->string('client');
            $table->string('numero_whatsapp');
            $table->date('date_depot');
            $table->date('date_retrait');
            $table->time('heure_retrait');
            $table->string('type_lavage');
            $table->string('emplacement');
            $table->timestamps();

        });

        Schema::create('commande_objet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->onDelete('cascade');
            $table->foreignId('objet_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Supprimer d'abord les tables liées (tables ayant des clés étrangères vers 'commandes')
        Schema::table('commande_objet', function (Blueprint $table) {
            $table->dropForeign(['commande_id']);  // Assurez-vous que cette colonne fait référence à 'commandes'
        });
        Schema::dropIfExists('commande_objet'); // Supprime la table pivot

        // Ensuite, supprimer la table 'commandes'
        Schema::dropIfExists('commandes');
    }

};