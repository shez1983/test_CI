<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ContactType;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactTypes = ContactType::all();

        User::all()->each(function ($user) use ($contactTypes) {
            Contact::factory()->count(3)->create([
                'user_id' => $user->getKey(),
                'contact_type_id' => $contactTypes->random()->getKey(),
            ]);
        });
    }
}
