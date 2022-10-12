@extends('layouts.header')

@section('title', 'Classements')

@section('contenu')
    <main class="classements">

        <!-- Image en arrière plan de la page de classements -->

        <div class="background-image">

            <!-- Contenu de la page 'Classements' -->
            
            <div class="classements-contenu">

                <!-- Classement des pilotes du championnat du monde de Formule 1 -->

                <ul class="classement-pilotes">
                    @foreach ($pilotes as $pilote)
                        <li class="ligne-pilote">
                            <img src="{{ asset('storage/pilote/' . $pilote->drapeau) }}" alt="Drapeau de nationalité du pilote">
                            <p class="pilote-nom">{{ $pilote->nom_pilote }}</p>
                            <img src="{{ asset('storage/pilote/' . $pilote->img_ecurie) }}" alt="Écusson de l'écurie du pilote">
                            <x-pilotes num_points="{{ $pilote->num_points }}" class="pilote-points"></x-pilotes>
                        </li>
                    @endforeach
                </ul>

                <!-- Classement des écuries du championnat du monde de Formule 1 -->

                <ul class="classement-ecuries">
                    @foreach ($ecuries as $ecurie => $key)
                        <li class="ligne-ecurie">
                            <x-ecuries nom_ecurie="{{ $ecuries[$ecurie]['nom_ecurie'] }}" points_ecurie="{{ $ecuries[$ecurie]['points_ecurie'] }}" class="ecurie-points"></x-ecuries>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>

    @include('layouts.footer')
@endsection