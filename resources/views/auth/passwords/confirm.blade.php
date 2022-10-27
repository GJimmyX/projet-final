@extends('layouts.header')

@section('title', 'Confirmer votre Mot de Passe')

@section('contenu')
    <div class="backgroundLogin">
        <div class="container confirmContainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <!-- Formulaire permettant de confirmer son mot de passe -->

                        <div class="card-header">{{ __('Confirmation Mot de Passe') }}</div>

                        <div class="card-body">
                            {{ __('Veuillez confirmer votre Mot de Passe avant de continuer') }}

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <!-- Champ de renseignement du mot de passe pour la confirmation -->

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Passe :') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        <!-- S'il y a une erreur, on affiche un message -->

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('Le mot de passe saisi est incorrect !') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Bouton permettant la confirmation du mot de passe -->

                                <div class="row mb-0">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirmer le Mot de Passe') }}
                                        </button>

                                        <!-- Si mot de passe oublié, lien permmettant d'être rediriger vers la page de demande de réinitialisation de mot de passe -->

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
