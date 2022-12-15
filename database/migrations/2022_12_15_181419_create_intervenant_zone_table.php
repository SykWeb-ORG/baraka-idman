<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenantZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenant_zone', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intervenant_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignId('zone_id')
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
        Schema::dropIfExists('intervenant_zone');
    }
}
