<?php

namespace App\Services;

use App\Models\Account;
use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\Provider;
use Illuminate\Support\Facades\Hash;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
            $user = Account::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = Account::create([
                    'email' => $providerUser->getEmail() ? $providerUser->getEmail() : $providerUser->getId(),
                    'name' => $providerUser->getName(),
                    'password' => Hash::make(str_random(8)),
                    'avatar' => $providerUser->getAvatar(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}