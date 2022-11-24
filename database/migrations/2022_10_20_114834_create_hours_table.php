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
        if (! Schema::hasTable('hours')) {
            Schema::create('hours', function (Blueprint $table) {
                $table->id();

                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->foreignId('opportunity_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->unsignedSmallInteger('amount')
                    ->comment('In minutes');

                $table->timestamp('rejected_at')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->string('rejected_reason')->nullable();

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
        Schema::dropIfExists('hours');
    }
};
