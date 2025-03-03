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
        // Créer la table 'commande_objets' (table pivot entre commandes et objets)
        Schema::create('commande_objets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->onDelete('cascade'); // Clé étrangère vers 'commandes'
            $table->foreignId('objet_id')->constrained()->onDelete('cascade'); // Clé étrangère vers 'objets'
            $table->integer('quantite'); // Quantité de l'objet dans la commande
            $table->string('description')->nullable();
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la table 'commande_objets' et ses clés étrangères
        Schema::dropIfExists('commande_objets');
    }
};