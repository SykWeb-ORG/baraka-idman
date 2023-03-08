<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateValidationUsersToBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaires', function (Blueprint $table) {
            $table->unsignedBigInteger('validation_social_assistant')
                ->nullable()
                ->change();
            $table->foreign('validation_social_assistant')
                ->references('id')
                ->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger('validation_directive')
                ->nullable()
                ->change();
            $table->foreign('validation_directive')
                ->references('id')
                ->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger('validation_medical_assistant')
                ->nullable()
                ->change();
            $table->foreign('validation_medical_assistant')
                ->references('id')
                ->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
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
