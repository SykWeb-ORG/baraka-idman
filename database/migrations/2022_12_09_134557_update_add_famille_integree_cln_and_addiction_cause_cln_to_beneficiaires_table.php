<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddFamilleIntegreeClnAndAddictionCauseClnToBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaires', function (Blueprint $table) {
            $table->boolean('famille_integre')->nullable()->after('famille_informee');
            $table->string('addiction_cause')->nullable()->after('famille_informee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiaires', function (Blueprint $table) {
            //
        });
    }
}
