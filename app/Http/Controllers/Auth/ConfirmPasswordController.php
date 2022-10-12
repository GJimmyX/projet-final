<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller de confirmation du mot de passe
    |--------------------------------------------------------------------------
    |
    | Ce controller assure la gestion des confirmations de mots de passe et
    | utilise une simple fonctionnalité pour inclure cette confirmation. Libre à nous
    | de l'utiliser et de modifier ces méthodes pour les personnaliser.
    |
    */

    use ConfirmsPasswords;

    /**
     * Redirection dans le cas que l'URL essayé a échoué
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Création d'une nouvelle instance dans le controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
