@extends('layouts.header')

@section('title', 'Plan du site')

@section('contenu')
    <main class="plan-du-site">

        <!-- Plan du site 'Passionné de Formule 1' -->

        <div class="liens-plan-du-site">

            <!-- Section Visiteur -->

            <div class="ligne01">

                <!-- Pages d'accueil et de classement -->

                <div class="planItem">
                    <a href="{{ route('index') }}">Accueil</a>
                </div>
                <div class="planItem">
                    <a href="{{ route('classements') }}">Classements</a>
                </div>
            </div>
            <div class="ligne02">

                <!-- Pages de biographies et de photos -->

                <div class="planItem">
                    <a href="{{ route('biographies') }}">Biographies de Pilotes</a>
                </div>
                <div class="planItem">
                    <a href="{{ route('photos') }}">Photos</a>
                </div>
            </div>
            <div class="ligne03">

                <!-- Pages de contact et de rechercher -->

                <div class="planItem">
                    <a href="{{ url('/contact') }}">Contact</a>
                </div>
                <div class="planItem">
                    <a href="{{ route('recherche') }}">Recherche</a>
                </div>
            </div>

            <!-- Page de Mentions légales -->

            <div class="ligne04">
                <div class="planItem">
                    <a href="{{ url('mentions-legales') }}">Mentions légales</a>
                </div>
            </div>

            <!-- Section Admin -->

            <div class="section-admin">

                <!-- Connexion / Déconnexion -->

                @guest()
                    <div class="adminPlanItem">
                        <a href="{{ route('login') }}">Connexion</a>
                    </div> 
                @else
                    <div class="adminPlanItem">
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest

                <div class="liens-admin">

                    <!-- Rubriques Admin -->

                    <div class="adminPlanItem">
                        <a href="{{ route('classement.pilotes.index') }}">Gestion des pilotes</a>
                    </div>
                    <div class="adminPlanItem">
                        <a href="{{ route('article.index') }}">Articles du site</a>
                    </div>
                    <div class="adminPlanItem">
                        <a href="{{ route('biographie.index') }}">Biographies du site</a>
                    </div>
                    <div class="adminPlanItem">
                        <a href="{{ route('photo.index') }}">Photos du site</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')

@endsection