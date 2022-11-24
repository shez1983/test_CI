<?php

namespace Database\Seeders;

use App\Models\Cvc;
use Illuminate\Database\Seeder;

class CvcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cvc::factory()->count(10)->create();
    }
}
