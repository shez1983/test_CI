<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('area_organisation')) {
            Schema::create('area_organisation', function (Blueprint $table) {
                $table->unsignedSmallInteger('area_id');
                $table->foreign('area_id')
                    ->references('id')
                    ->on('areas');

                $table->foreignId('organisation_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->primary(['area_id', 'organisation_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_organisation');
    }
};
