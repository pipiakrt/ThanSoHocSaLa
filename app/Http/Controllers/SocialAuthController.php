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
        return response()->json([
            "url" => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl()
        ]);
    }

    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));
        // Auth::login($user);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();

        dd($user);
        $action = env('URL_FRONDTEND', 'https://beta.sieuthitamlinhsala.vn') . '/tai-khoan?token=Bearer '.$tokenResult->accessToken;
        return '<script>window.location.replace("'. $action .'")</script>';
    }
}
