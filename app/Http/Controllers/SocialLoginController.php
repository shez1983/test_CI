<?php

namespace App\Http\Controllers;

use App\Actions\Users\CreateUserAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

class SocialLoginController extends Controller
{
    public function redirect($social): RedirectResponse
    {
        $this->validateSocialProvider($social);

        return Socialite::driver($social)->redirect();
    }

    public function callback($social): RedirectResponse
    {
        $this->validateSocialProvider($social);

        $user = Socialite::driver($social)->user();

        [$firstName, $lastName] = explode(' ', $user->getName());

        $user = (new CreateUserAction)->handle([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $user->getEmail(),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    /**
     * @param $social
     * @return void
     */
    public function validateSocialProvider($social): void
    {
        if (! in_array($social, ['facebook', 'google'])) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
