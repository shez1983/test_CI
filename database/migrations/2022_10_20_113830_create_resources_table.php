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
        if (! Schema::hasTable('resources')) {
            Schema::create('resources', function (Blueprint $table) {
                $table->id();

                $table->morphs('resourceable');

                $table->string('name');
                $table->string('path');
                $table->string('mime_type')->comment('e.g: application/pdf, image/jpeg');
                $table->string('extension')->comment('e.g: pdf, jpeg');
                $table->unsignedBigInteger('size')->comment('The size of the file in bytes');
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
        Schema::dropIfExists('resources');
    }
};
