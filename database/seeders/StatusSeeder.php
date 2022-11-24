<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // No need for fake data, just seed the real statuses if they're not in there...
        Status::firstOrCreate(['name' => Status::PENDING]);
        Status::firstOrCreate(['name' => Status::REJECTED]);
        Status::firstOrCreate(['name' => Status::APPROVED]);
    }
}
