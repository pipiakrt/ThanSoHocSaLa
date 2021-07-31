<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '238981638036833',
        'client_secret' => '4a47b0d7d2c89e41e0895ad99530f2bf',
        'redirect' => env('APP_URL') . '/socialite/facebook/callback',
    ],

    'google' => [
        'client_id' => '642140725261-smi4k7n0jiru0a12v1hqq4cd70v1a5l9.apps.googleusercontent.com',
        'client_secret' => '-a36EhvZzoiIEOcCxepy0Co4',
        'redirect' => env('APP_URL') . '/socialite/google/callback',
    ],

];
