@extends('photo.layout')

@section('title', $photo->titre_photo)

@section('contenu-photos')
    <main class="show-admin-photos">

        <!-- Titre de la page d'affichage et bouton de retour sur l'accueil administrateur -->

        <div class="row show-titre-btn">
            <div class="titre-btn-show">
                <!-- Bouton -->
                <a href="{{ route('photo.index') }}" class="btn-show"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                <h2 class="titre-show">Gestionnaire de Photos Passionné de Formule 1 - Photo enregistrée</h2>
            </div>
        </div>

        <!-- Arrière plan de la page de visualisation -->

        <div class="background-show">

        <div class="show-container">

            <!-- Affichage la photo et de la description de l'image -->

            <div class="row">
                <!-- Photo importée -->
                <div class="show-photo">
                    <strong>Photo importée :</strong>
                    <img src="{{ asset('storage/photo/' . $photo->image_photo) }}" alt="Image de la publication" class="img-photo">
                </div>
                <!-- Description de la photo -->
                <div class="show-desc">
                    <strong>Description de la photo :</strong>
                    <p class="desc-photo">{{ $photo->desc_photo }}</p>
                </div>
            </div>
        </div>

        </div>
    </main>
@endsection