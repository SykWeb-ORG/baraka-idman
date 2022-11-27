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
            $table->string('niveau_scolaire');
            $table->string('situation_familial');
            $table->boolean('orphelin');
            $table->string('profession');
            $table->string('zone_habitation');
            $table->string('localisation');
            $table->boolean('famille_informee');
            $table->boolean('age_debut_addiction');
            $table->string('duree_addiction');
            $table->boolean('ts');
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
