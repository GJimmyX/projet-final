@extends('layouts.header')

@section('title', 'Connexion Administrateur')

@section('contenu')
    <div class="backgroundLogin">
        <div class="container loginContainer">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <!-- Si la connexion a échouée, on affiche un message d'erreur de connexion -->
                        
                    <div class="login-message">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <p>{{ session()->get('error') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="card">
                        <!-- Formulaire de login administrateur du site 'Passionné de Formule 1' -->

                        <div class="card-header">{{ __('Connexion Administrateur') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Champ de renseignement de l'adresse mail -->

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('Email :') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div>

                                <!-- Champ de renseignement du mot de passe -->

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Mot de Passe :') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                </div>

                                <!-- Coche permettant de retenir les identifiants de connexion -->

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php old('remember') ? 'checked' : ''; ?>>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Se souvenir de moi') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bouton d'envoi du formulaire de connexion -->

                                <div class="row mb-0">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Connexion') }}
                                        </button>

                                        <!-- Lien permettant de réinitialiser le mot de passe -->

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Mot de passe oublié ?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection