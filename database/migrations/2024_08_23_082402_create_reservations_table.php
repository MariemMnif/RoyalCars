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
        Schema::Create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_prise');
            $table->date('date_location');
            $table->time('heure_location');
            $table->string('lieu_retour');
            $table->date('date_retour');
            $table->time('heure_retour');
            $table->string('etat');
            $table->decimal('montant', 15, 2);
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('voiture_id')->constrained('voitures')->onDelete('cascade');
            $table->foreignId('vol_id')->constrained('vols')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
