@extends('layouts.header')

@section('title', 'Demande de réinitialisation du Mot de Passe')

@section('contenu')
    <div class="backgroundLogin">
        <div class="container emailContainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <!-- Formulaire permettant de recevoir un lien de réinitialisation du mot de passe -->

                        <div class="card-header">{{ __('Réinitialisation du Mot de Passe') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Champ de renseignement de l'email pour l'envoi du lien -->

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email :') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        <!-- S'il y a une erreur, on affiche un message -->

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Bouton permettant l'envoi du lien -->

                                <div class="row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Envoi du lien de réinitialisation du Mot de Passe') }}
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
