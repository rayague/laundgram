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
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day'); // Jour de la semaine (ex: Lundi, Mardi, ...)
            $table->time('start_time'); // Heure de début
            $table->time('end_time'); // Heure de fin
            $table->enum('status', ['open', 'closed'])->default('open'); // Ouvert ou fermé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};