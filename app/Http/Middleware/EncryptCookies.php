<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Nom des cookies exclus de l'encryptage.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
