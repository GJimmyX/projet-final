@extends('layouts.header')

@section('title', $biographie->nom_prenom_pilote)

@section('contenu')
    <main class="single-biographie">

        <!-- Bouton de retour sur la page de biographies -->

        <div class="backBtn">
            <!-- Bouton -->
            <a href="{{ route('biographies') }}" class="btn-single">< Retour</a>
        </div>

        <!-- Image en arrière plan de la page Single biographie -->

        <div class="background-image">

            <!-- Contenu de la page Single -->

            <div class="biographie-contenu">
                <div class="biographie-image-infos-pilote">
                    <div class="image-biographie">
                        <img src="{{ asset('storage/biographie/' . $biographie->image_biographie) }}" alt="Image d'illustration de la biographie">
                    </div>
                    <ul class="infos-pilote-biographie">
                        <li class="nom-prenom-pilote">{{ $biographie->nom_prenom_pilote }}</li>
                        <div class="naissance">
                            <span>Naissance :</span>
                            <li class="date-naissance"><x-date date="{{ $biographie->date_naissance }}" class="date"></x-date></li>
                        </div>
                        @if (isset($biographie->date_deces))
                            <div class="deces">
                                <span>Décès :</span>
                                <li class="date-deces"><x-date date="{{ $biographie->date_deces }}" class="date"></x-date></li>
                            </div>
                        @endif
                        <div class="carriere-f1">
                            <span>Carrière en Formule 1 :</span>
                            <li class="carriere">{{ $biographie->carriere }}</li>
                        </div>
                        <div class="reseaux-sociaux">
                            <span>Réseaux sociaux :</span>
                            <li class="reseaux">{{ $biographie->reseaux }}</li>
                        </div>
                    </ul>
                </div>
                <p class="texte-biographie">{{ $biographie->texte_biographie }}</p>
            </div>
        </div>
    </main>

    @include('layouts.footer')

@endsection