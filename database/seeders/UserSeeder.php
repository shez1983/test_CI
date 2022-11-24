<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(10)
            ->has(Profile::factory()
                ->has(Address::factory())
            )
            ->create();

        User::factory()
            ->has(Profile::factory()
                ->has(Address::factory())
            )
            ->create([
                'email' => 'vw@3ev.org',
            ]);
    }
}
