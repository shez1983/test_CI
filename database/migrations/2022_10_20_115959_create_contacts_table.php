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
        if (! Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->unsignedSmallInteger('contact_type_id');
                $table->foreign('contact_type_id')
                    ->references('id')
                    ->on('contact_types');

                $table->string('title')->nullable();
                $table->string('name', 100);
                $table->string('phone', 25);
                $table->string('relationship', 45);
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
        Schema::dropIfExists('contacts');
    }
};
