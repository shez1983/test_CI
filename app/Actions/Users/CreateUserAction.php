<?php

namespace App\Actions\Users;

use App\Models\User;

class CreateUserAction
{
    public function handle($data)
    {
        return User::updateOrCreate([
            'email' => $data['email'],
        ], [
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
        ]);
    }
}
