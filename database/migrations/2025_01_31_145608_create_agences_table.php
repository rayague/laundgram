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
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de l'agence
            $table->string('responsable_nom'); // Nom du responsable
            $table->string('responsable_tel'); // Numéro du responsable
            $table->string('adresse'); // Adresse de l'agence
            $table->string('specification')->nullable(); // Spécification de l'agence
            $table->string('rccm'); // RCCM de l'agence
            $table->string('ifu'); // Numéro IFU
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agences');
    }
};