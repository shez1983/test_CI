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
        if (! Schema::hasTable('category_opportunity')) {
            Schema::create('category_opportunity', function (Blueprint $table) {
                $table->unsignedSmallInteger('category_id');
                $table->foreign('category_id')
                    ->references('id')
                    ->on('categories');

                $table->foreignId('opportunity_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->primary([
                    'category_id',
                    'opportunity_id',
                ]);
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
        Schema::dropIfExists('category_opportunity');
    }
};
