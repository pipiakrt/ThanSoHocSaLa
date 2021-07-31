<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SocialAuthController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));
        Auth::login($user);

        return redirect('/tai-khoan');
    }
}
