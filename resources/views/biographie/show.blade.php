@extends('biographie.layout')

@section('title', 'Biographie de ' . $biographie->nom_prenom_pilote)

@section('contenu-biographies')
    <main class="show-admin-biographies">

        <!-- Titre de la page d'affichage et bouton de retour sur l'accueil administrateur -->

        <div class="row show-titre-btn">
            <div class="titre-btn-show">
                <!-- Bouton -->
                <a href="{{ route('biographie.index') }}" class="btn-show"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                <h2 class="titre-show">Gestionnaire de Biographies Passionné de Formule 1 - Biographie enregistrée</h2>
            </div>
        </div>

        <!-- Arrière plan de la page de visualisation -->

        <div class="background-show">

            <div class="show-container" style="background-image: url('<?php echo asset('storage/biographie/' . $biographie->background_image); ?>');">

                <!-- Affichage du nom & prénom du pilote, de l'image de la biographie et du texte de la biographie -->

                <div class="row">
                    <!-- Nom & Prénom du pilote -->
                    <div class="show-nom-prenom-pilote">
                        <strong>Nom & Prénom du pilote :</strong>
                        <p class="nom-prenom-pilote">{{ $biographie->nom_prenom_pilote }}</p>
                    </div>
                    <!-- Image de la biographie -->
                    <div class="show-image-biographie">
                        <strong>Image de la biographie :</strong>
                        <img src="{{ asset('storage/biographie/' . $biographie->image_biographie) }}" alt="Image illustrant la biographie du pilote" class="image-biographie">
                    </div>
                    <!-- Texte de la biographie -->
                    <div class="show-texte-biographie">
                        <strong>Texte de la biographie :</strong>
                        <p class="texte-biographie">{{ $biographie->texte_biographie }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection