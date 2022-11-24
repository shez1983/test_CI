<?php

use App\Models\Status;
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
        if (! Schema::hasTable('statuses')) {
            Schema::create('statuses', function (Blueprint $table) {
                $table->smallIncrements('id');
                $table->string('name')->unique();
            });

            Status::firstOrCreate(['name' => Status::PENDING]);
            Status::firstOrCreate(['name' => Status::REJECTED]);
            Status::firstOrCreate(['name' => Status::APPROVED]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
};
