<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRenameDrogueTypeNameClnToDrogueTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drogue_types', function (Blueprint $table) {
            $table->renameColumn('service_nom', 'drogue_nom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drogue_types', function (Blueprint $table) {
            //
        });
    }
}
