@extends('layouts.header')

@section('title', 'Réinitialisation du Mot de Passe')

@section('contenu')
    <div class="backgroundLogin">
        <div class="container resetContainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <!-- Formulaire permettant la réinitialisation du mot de passe -->

                        <div class="card-header">{{ __('Réinitialisation du Mot de Passe') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <!-- Champ de renseignement de l'email pour la réinitialisation -->

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email :') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        <!-- S'il y a une erreur, on affiche un message -->

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('Veuillez renseigner l\'email associé à votre compte !') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Champ de renseignement du nouveau mot de passe pour la réinitialisation -->

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Passe :') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        <!-- S'il y a une erreur, on affiche un message -->

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('Le mot de passe doit être de 8 caractères minimum !') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Champ de confirmation du nouveau mot de passe pour la réinitialisation -->

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer le Mot de Passe :') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Bouton permettant la réinitialisation du mot de passe -->

                                <div class="row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn col-12">
                                            {{ __('Réinitialiser le Mot de Passe') }}
                                        </button>
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
