<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddRegistrantClnToBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaires', function (Blueprint $table) {
            $table->dropForeign(['intervenant_id']);
            $table->dropIndex('beneficiaires_intervenant_id_foreign');
            $table->dropColumn('intervenant_id');
            $table->foreignId('user_id')
                    ->nullable()
                    ->after('type_travail')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
