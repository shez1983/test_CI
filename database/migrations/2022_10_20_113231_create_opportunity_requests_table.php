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
        if (! Schema::hasTable('opportunity_requests')) {
            Schema::create('opportunity_requests', function (Blueprint $table) {
                $table->id();

                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->foreignId('opportunity_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->timestamp('rejected_at')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->string('rejected_reason')->nullable();

                $table->unsignedSmallInteger('status_id');
                $table->foreign('status_id')
                    ->references('id')
                    ->on('statuses');

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
        Schema::dropIfExists('opportunity_requests');
    }
};
