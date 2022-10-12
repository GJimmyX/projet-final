<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui sont exclus de la vérification avec le token @CSRF sont rensignés ci-dessous.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
