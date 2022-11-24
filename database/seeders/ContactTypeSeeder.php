<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultStatuses = ['reference'];

        foreach ($defaultStatuses as $name) {
            ContactType::firstOrCreate(['name' => $name]);
        }
    }
}
