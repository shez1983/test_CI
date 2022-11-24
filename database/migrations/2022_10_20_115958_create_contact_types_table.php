<?php

use App\Models\ContactType;
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
        if (! Schema::hasTable('contact_types')) {
            Schema::create('contact_types', function (Blueprint $table) {
                $table->smallIncrements('id');
                $table->string('name', 45)->unique();
            });

            foreach (ContactType::TYPES as $name) {
                ContactType::firstOrCreate(['name' => $name]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_types');
    }
};
