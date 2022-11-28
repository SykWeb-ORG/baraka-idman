<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaireViolenceTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaire_violence_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiaire_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignId('violence_type_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('beneficiaire_violence_type');
    }
}
