<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller de vérification des emails
    |--------------------------------------------------------------------------
    |
    | Ce controller s'assure de la gestion de la vérification de l'email pour tout
    | utilisateur inscrit récemment sur l'application. Les emails peuvent être
    | renvoyés si l'utilisateur n'a pas reçu le premier email qui a été envoyé.
    |
    */

    use VerifiesEmails;

    /**
     * Redirection des utilisateurs après la vérification de l'email.
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
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
