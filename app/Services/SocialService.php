<?php declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Social;
use Laravel\Socialite\Contracts\User as SocialUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialService implements Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            return route('register');
        }

        $user->name = $socialUser->getName();
        // $user->avatar = $socialUser->getAvatar();
        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }

        // throw new \Exception("Did not save user");
    }

}