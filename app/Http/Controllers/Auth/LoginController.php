<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controller de connexion
    |--------------------------------------------------------------------------
    |
    | Ce controller gère l'authentification des utilisateurs à l'application et
    | les redirige ensuite sur la page d'accueil. Ce controller utilise une fonctionnalité
    | pour une utilisation conventionnelle dans toutes les applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirection après la connexion d'un utilisateur.
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
        $this->middleware('guest')->except('logout');
    }

    /* Fonction d'affichage du formulaire de connexion du site 'Passionné de Formule 1' */

    public function passionf1LoginForm()
    {
        return view('auth.login');
    }

    /* Fonction de connexion au site 'Passionné de Formule 1' */

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            return redirect()->route('article.index')
                ->with('success', "Vous êtes connecté !");
        }else{
            return redirect()->route('connexion_passionf1')
                ->with('error', "L'email et/ou le mot de passe sont incorrectes.");
        }
    }

    /* Fonction de déconnexion du site 'Passionné de Formule 1' */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index')
            ->with('success', "Vous êtes déconnecté !");
    }
}
