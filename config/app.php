<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Nom de l'application
    |--------------------------------------------------------------------------
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Environnement de l'application (Développement OU production)
    |--------------------------------------------------------------------------
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Mode débug de l'application
    |--------------------------------------------------------------------------
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de l'application
    |--------------------------------------------------------------------------
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Fuseau horaire de l'application
    |--------------------------------------------------------------------------
    |
    */

    'timezone' => 'Europe/Paris',

    /*
    |--------------------------------------------------------------------------
    | Configuration locale de l'application
    |--------------------------------------------------------------------------
    |
    */

    'locale' => 'fr',

    /*
    |--------------------------------------------------------------------------
    | Retour d'application local
    |--------------------------------------------------------------------------
    |
    */

    'fallback_locale' => 'fr',

    /*
    |--------------------------------------------------------------------------
    | Simulateur local
    |--------------------------------------------------------------------------
    |
    */

    'faker_locale' => 'fr_FR',

    /*
    |--------------------------------------------------------------------------
    | Clé d'encryptage
    |--------------------------------------------------------------------------
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Pilote du mode maintenance
    |--------------------------------------------------------------------------
    |
    | Pilotes supportés: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Gestionnaire de service d'autoload
    |--------------------------------------------------------------------------
    |
    */

    'providers' => [

        /*
         * Gestionnaires de service pour le framework Laravel
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Gestionnaire de service de paquets...
         */

        /*
         * Gestionnaire de service d'applications...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Alias de classe
    |--------------------------------------------------------------------------
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'ExampleClass' => App\Example\ExampleClass::class,
    ])->toArray(),

];
