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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->onDelete('cascade'); // Lien vers la commande
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien vers l'utilisateur qui a ajouté la note
            $table->longText('note'); // Le contenu de la note
            $table->json('commande_details')->nullable(); // Stocker les informations importantes de la commande
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};