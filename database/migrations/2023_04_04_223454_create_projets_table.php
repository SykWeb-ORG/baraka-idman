<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('projet_num_concention');
            $table->string('projet_titre');
            $table->string('projet_description')->nullable();
            $table->integer('projet_objectif_homme')->default(0);
            $table->integer('projet_objectif_femme')->default(0);
            $table->integer('projet_objectif_15')->default(0);
            $table->integer('projet_objectif_15_18')->default(0);
            $table->integer('projet_objectif_18')->default(0);
            $table->foreignId('partenaire_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('projets');
    }
}
