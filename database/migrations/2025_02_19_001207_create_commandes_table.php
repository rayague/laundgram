<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Créer la table 'commandes'
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('client');
            $table->string('numero_whatsapp');
            $table->string('numero')->unique();
            $table->date('date_depot');
            $table->date('date_retrait');
            $table->time('heure_retrait');
            $table->string('statut')->default('Non retirée');

            // Ajout des colonnes nécessaires pour les calculs financiers
            $table->decimal('avance_client', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('solde_restant', 10, 2)->default(0);
            $table->unsignedTinyInteger('remise_reduction')->default(0); // Pourcentage entier (0-100)
            $table->decimal('original_total', 10, 2)->default(0); // Nouveau
            $table->decimal('discount_amount', 10, 2)->default(0); // Nouveau

            $table->string('type_lavage');
            $table->timestamps();
        });
    }

    // Migration pour la table pivot 'commande_objet'


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('commandes');
        Schema::enableForeignKeyConstraints();
    }
};
