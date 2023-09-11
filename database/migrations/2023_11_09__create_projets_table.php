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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('plateforme_id');
            $table->unsignedBigInteger('status_id');
            $table->decimal('montantInvesti');
            $table->decimal('frais');
            $table->boolean('fiscalite');
            $table->decimal('tauxBrut');
            $table->decimal('tauxNet');
            $table->integer('duree');
            $table->dateTime('dateDebut');
            $table->dateTime('dateFin');
            $table->unsignedBigInteger('versement_id');
            $table->decimal('gainMensu');
            $table->decimal('gainFinal');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('plateforme_id')->references('id')->on('plateformes');
            $table->foreign('versement_id')->references('id')->on('versements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
