@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification vient d\'être envoyé à votre adresse email.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, vérifier votre boîte de réception pour un lien de vérification.') }}
                    {{ __('Si vous n\'avez pas reçu d\'email de vérification') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquer ici pour renvoyer un lien') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
