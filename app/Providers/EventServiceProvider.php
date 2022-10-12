<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Carte de l'évènement à l'audit pour l'application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Enregistrement de chaque évènement dans l'application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Détermine si les évènements et audits doivent être découverts automatiquement.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
