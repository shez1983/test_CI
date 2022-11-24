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
        if (! Schema::hasTable('profiles')) {
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->string('reference')->unique();
                $table->uuid('passport_uuid')->unique();

                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->boolean('speaks_welsh');
                $table->boolean('use_welsh');
                $table->string('sex', 45);
                $table->date('birthday');
                $table->boolean('is_emergency_volunteer');
                $table->date('dbs_expires_at');
                $table->tinyInteger('has_disability');

                $table->string('emergency_contact_name');
                $table->string('emergency_contact_phone');
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
        Schema::dropIfExists('profiles');
    }
};
