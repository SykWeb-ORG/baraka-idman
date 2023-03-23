<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddClnUniteFrequenceToBeneficiaireDrogueTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaire_drogue_type', function (Blueprint $table) {
            $table->string('unite_frequence')
                ->after('frequence')
                ->nullable()
                ->default('jour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiaire_drogue_type', function (Blueprint $table) {
            //
        });
    }
}
