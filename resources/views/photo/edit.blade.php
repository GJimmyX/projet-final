@extends('photo.layout')

<!-- En fonction de l'importation ou de l'édition de photos, modification du titre de la page -->

@if (isset($photo))
    <!-- Titre de la page d'édition -->
    @section('title', 'Édition de la photo : ' . $photo->titre_photo)
@else
    <!-- Titre de la page de création/importation -->
    @section('title', 'Importer une photo')
@endif

@section('contenu-photos')
    <main class="create-edit-admin-photos">

        <!-- Titre de la page et bouton de retour sur l'accueil administrateur -->

        <div class="row create-edit-titre-btn">
            <div class="titre-btn-create-edit">
                <!-- Bouton -->
                <a href="{{ route('photo.index') }}" class="btn-create-edit"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                @if (isset($photo))
                    <h2 class="titre-edit">Gestionnaire de Photos Passionné de Formule 1 - Éditer une photo importée</h2>
                @else
                    <h2 class="titre-create">Gestionnaire de Photos Passionné de Formule 1 - Importer une nouvelle photo</h2>
                @endif
            </div>
        </div>

        @if (isset($photo))

        <!-- Image en arrière plan de la page d'édition -->

        <div class="background-image background-edit">

        @else

        <!-- Image en arrière plan de la page de création/importation -->

        <div class="background-image background-create">

        @endif

            <!-- Affichage du formulaire pour l'importation ou l'édition des photos -->

            <div class="create-edit-container">

            <!-- S'il y a une erreur, on affiche un message -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oups ! </strong>Il y a des problèmes avec votre post/photo.
                    <ul>
                        @foreach ( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (isset($photo))

            <!-- Formulaire d'édition d'une photo importée en pouvant modifier le titre et description de la photo et éventullement remplacer l'image utilisée -->

            <form action="{{ route('photo.update', $photo) }}" method="post" enctype="multipart/form-data" class="edit-form">
            @method('PUT')

            @else

            <!-- Formulaire d'importation d'une photo en lui indiquant un titre et description de photo et en choisissant l'image à importer -->            

            <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data" class="create-form">

            @endif

                @csrf

                    <div class="row">
                        <!-- Photo importée -->
                        <div class="form-photo-champ-image-photo">
                            <label for="image_photo"><strong>Photo :</strong></label>
                            @if (isset($photo->image_photo))
                                <div class="edit-champ-image-photo">
                                    <img src="{{ asset('storage/photo/' . $photo->image_photo) }}" alt="Photo importée" class="img-actuelle">
                                    <input type="file" name="image_photo" id="image_photo" class="form-control input-nvl-photo">
                                </div>
                            @else
                                <input type="file" name="image_photo" id="image_photo" class="form-control">
                            @endif
                        </div>
                        <!-- Titre de la photo -->
                        <div class="form-photo-champ-titre-photo">
                            <strong>Titre de la photo :</strong>
                            <input type="text" name="titre_photo" id="titre_photo" value="{{isset($photo->titre_photo) ? $photo->titre_photo : old('titre_photo')}}" placeholder="Titre de la photo" class="form-control">
                        </div>
                        <!-- Description de la photo -->
                        <div class="form-photo-champ-desc-photo">
                            <strong>Description de la photo :</strong>
                            <textarea name="desc_photo" id="desc_photo" placeholder="Description de la photo" cols="30" rows="10" class="form-control">{{isset($photo->desc_photo) ? $photo->desc_photo : old('desc_photo')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton d'envoi du formulaire (rempli) d' importation/édition de photos -->

            <div class="create-envoy">
                <button type="submit" class="btn-envoy"><img src="{{ url('/images/bouton_icones/envoyBtn.png') }}" alt="Icône du bouton d'envoi">Envoyer</button>
            </div>
        </form> 
    </main>    
@endsection