<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Les URL's qui peuvent être accessibles lorsque le mode maintenance du site est actif sont rensignés ci-dessous.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
