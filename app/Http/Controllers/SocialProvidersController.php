<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use App\Services\Contracts\Social;

class SocialProvidersController extends Controller
{
    public function redirect(string $dreiver): mixed
    {
        return Socialite::driver($dreiver)->redirect();
    }

    public function callback(string $driver, Social $social)
    {
        return redirect($social->loginAndGetRedirectUrl(
            Socialite::driver($driver)->user())
        );
        // $user = Socialite::driver($driver)->user();
    }
}
