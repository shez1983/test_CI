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
        if (! Schema::hasTable('opportunities')) {
            Schema::create('opportunities', function (Blueprint $table) {
                $table->id();

                $table->foreignId('organisation_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->unsignedSmallInteger('status_id');
                $table->foreign('status_id')
                    ->references('id')
                    ->on('statuses');

                $table->string('reference')->unique();
                $table->string('slug')->unique();
                $table->string('title');
                $table->string('title_w');
                $table->longText('description');
                $table->longText('description_w');

                $table->string('location', 45)
                    ->comment('Does this need to be lat lng columns as there is a map in the designs?');

                $table->date('publish_expiry_date');
                $table->date('live_at');

                $table->date('started_at');
                $table->date('expires_at');
                $table->time('start_time');
                $table->time('end_time');

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
        Schema::dropIfExists('opportunities');
    }
};
