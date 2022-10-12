@extends('classement.pilotes.layout')

@section('title', $pilote->nom_pilote)

@section('contenu-pilotes')
    <main class="show-admin-pilotes">
        
        <!-- Titre de la page d'affichage et bouton de retour sur l'accueil administrateur -->

        <div class="row show-titre-btn">
            <div class="titre-btn-show">
                <!-- Bouton -->
                <a href="{{ route('classement.pilotes.index') }}" class="btn-show"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                <h2 class="titre-show">Gestionnaire de Pilotes Passionné de Formule 1 - Pilote enregistré</h2>
            </div>
        </div>

        <!-- Arrière plan de la page de visualisation -->

        <div class="background-show">

            <div class="show-container">

                <!-- Affichage du nom du pilote, de sa nationalité avec son drapeau associé, de son nombre de points et de l'écusson de son écurie -->

                <div class="row">
                    <!-- Nom du pilote -->
                    <div class="show-nom">
                        <strong>Nom du pilote :</strong>
                        <p class="nom-pilote">{{ $pilote->nom_pilote }}</p>
                    </div>
                    <!-- Nationalité et drapeau associé -->
                    <div class="show-nationalite-drapeau">
                        <strong>Nationalité et drapeau associé à celle-ci :</strong>
                        <p class="nationalite-pilote">{{ $pilote->nationalite }}</p>
                        <img src="{{ asset('storage/pilote/' . $pilote->drapeau) }}" alt="Drapeau correspondant à la nationalité du pilote" class="drapeau-pilote">
                    </div>
                    <!-- Nombre de points du pilote au classement pilotes -->
                    <div class="show-points">
                        <strong>Nombre de points du pilote :</strong>
                        <p class="points-pilote">{{ $pilote->num_points }}</p>
                    </div>
                    <!-- Écusson de l'écurie du pilote -->
                    <div class="show-img_ecurie">
                        <strong>Écusson de l'écurie du pilote :</strong>
                        <img src="{{ asset('storage/pilote/' . $pilote->img_ecurie) }}" alt="Écusson de l'écurie du pilote" class="ecurie-pilote">
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection