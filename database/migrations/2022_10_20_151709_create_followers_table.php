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
        if (! Schema::hasTable('followers')) {
            Schema::create('followers', function (Blueprint $table) {
                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->morphs('followable');

                $table->timestamp('created_at')
                    ->useCurrent();

                $table->primary([
                    'user_id',
                    'followable_id',
                    'followable_type',
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
        Schema::dropIfExists('followers');
    }
};
