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
        Schema::create('horaires', function (Blueprint $table) {
            $table->id();  // Pas besoin de définir de valeur par défaut ici
            $table->time('monday_to_friday_start')->default('08:00:00');
            $table->time('monday_to_friday_end')->default('18:00:00');
            $table->time('saturday_start')->default('08:00:00');
            $table->time('saturday_end')->default('18:00:00');
            $table->string('sunday')->default('Fermé');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horaires');
    }
};