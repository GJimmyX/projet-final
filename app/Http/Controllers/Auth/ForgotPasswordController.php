<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller de Réinitialisation de Mot de passe
    |--------------------------------------------------------------------------
    |
    | Ce controller assure la gestion des mails de réinitialisation de mots de passe et
    | inclus une fonctionnalité permettant de gérer l'envoi des mails depuis
    | l'application pour les utilisateurs du site. Libre à nous de modifier cette fonctionnalité.
    |
    */

    use SendsPasswordResetEmails;
}
