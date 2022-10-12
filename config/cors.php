<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuration du 'Cross-Origin Resource Sharing' (CORS)
    |--------------------------------------------------------------------------
    |
    | Pour en savoir plus: https://developer.mozilla.org/fr-FR/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
