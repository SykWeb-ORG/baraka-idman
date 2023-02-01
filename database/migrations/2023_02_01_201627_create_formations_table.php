<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->date('formation_titre');
            $table->date('formation_date')->nullable();
            $table->time('formation_heure')->nullable();
            $table->string('formation_duree')->nullable();
            $table->string('organisme')->nullable();
            $table->string('formateur')->nullable();
            $table->string('objet')->nullable();
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
        Schema::dropIfExists('formations');
    }
}
