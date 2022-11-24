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
        if (! Schema::hasTable('organisations')) {
            Schema::create('organisations', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();

                $table->unsignedBigInteger('parent_id')
                    ->nullable();
                $table->foreign('parent_id')
                    ->references('id')
                    ->on('organisations');

                $table->unsignedSmallInteger('cvc_id');
                $table->foreign('cvc_id')
                    ->references('id')
                    ->on('cvcs');

                $table->foreignId('volunteer_centre_id')
                    ->nullable()
                    ->constrained();

                $table->boolean('has_volunteering_policy');
                $table->boolean('has_volunteer_insurance');
                $table->timestamps();
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
        Schema::dropIfExists('organisations');
    }
};
