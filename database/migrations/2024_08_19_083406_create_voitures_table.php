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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque_modele');
            $table->year('annee_fabrication');
            $table->string('etat');
            $table->string('type_transmission');
            $table->string('type_carburant');
            $table->string('categorie');
            $table->integer('nb_portes');
            $table->integer('nb_places');
            $table->integer('capacite_coffre');
            $table->text('description');
            $table->binary('image');
            $table->string('disponibilite');
            $table->integer('prix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
