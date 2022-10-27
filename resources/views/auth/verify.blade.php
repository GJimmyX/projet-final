@extends('layouts.header')

@section('title', 'Confirmer votre email')

@section('contenu')
    <div class="backgroundLogin">
        <div class="container verifyContainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <!-- Formulaire permettant de confirmer son email -->

                        <div class="card-header">{{ __('Vérifier votre adresse email') }}</div>

                        <div class="card-body">

                            <!-- Si le lien vient d'être renvoyé, message d'information pour l'envoi de ce dernier -->

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Un lien de vérification vient d\'être envoyé à votre adresse email.') }}
                                </div>
                            @endif

                            <!-- Avertissement de vérification du mail -->

                            {{ __('Avant de continuer, vérifier votre boîte de réception pour un lien de vérification.') }}
                            {{ __('Si vous n\'avez pas reçu d\'email de vérification') }},

                            <!-- Bouton de renvoi du lien de vérification si on en a pas reçu -->

                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquer ici pour renvoyer un lien') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
