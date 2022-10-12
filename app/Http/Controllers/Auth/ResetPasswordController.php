<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller de réinitialisation de mots de passe
    |--------------------------------------------------------------------------
    |
    | Ce controller s'assure de la gestion des requêtes de réinitialisation de mots de passe
    | et utilise une fonctionnalité pour inclure cette gestion. Libre à nous
    | de l'utiliser et de modifier ces méthodes pour les personnaliser.
    |
    */

    use ResetsPasswords;

    /**
     * Redirection après avoir effectué la réinitialisation du mot de passe.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
