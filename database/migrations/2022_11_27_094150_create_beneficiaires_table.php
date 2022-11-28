<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('prenom');
            $table->string('nom');
            $table->string('adresse');
            $table->string('sexe');
            $table->string('cin');
            $table->string('telephone');
            $table->string('type_travail');
            $table->foreignId('intervenant_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('niveau_scolaire')->nullable();
            $table->string('situation_familial')->nullable();
            $table->boolean('orphelin')->nullable();
            $table->string('profession')->nullable();
            $table->string('zone_habitation')->nullable();
            $table->string('localisation')->nullable();
            $table->boolean('famille_informee')->nullable();
            $table->boolean('age_debut_addiction')->nullable();
            $table->string('duree_addiction')->nullable();
            $table->boolean('ts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaires');
    }
}
