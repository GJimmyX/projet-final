<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | États des domaines
    |--------------------------------------------------------------------------
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort()
    ))),

    /*
    |--------------------------------------------------------------------------
    | Gardes Sanctum
    |--------------------------------------------------------------------------
    |
    */

    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Délai d'expiration
    |--------------------------------------------------------------------------
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware Sanctum
    |--------------------------------------------------------------------------
    |
    */

    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
