@extends('biographie.layout')

<!-- En fonction de la création ou de l'édition de biographies, modification du titre de la page -->

@if (isset($biographie))
    <!-- Titre de la page d'édition -->
    @section('title', 'Édition de la biographie de : ' . $biographie->nom_prenom_pilote)
@else
    <!-- Titre de la page de création -->
    @section('title', 'Créer une nouvelle biographie')
@endif

@section('contenu-biographies')
    <main class="create-edit-admin-biographies">

        <!-- Titre de la page et bouton de retour sur l'accueil administrateur -->

        <div class="row create-edit-titre-btn">
            <div class="titre-btn-create-edit">
                <!-- Bouton -->
                <a href="{{ route('biographie.index') }}" class="btn-create-edit"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                @if (isset($biographie))
                    <h2 class="titre-edit">Gestionnaire de Biographies Passionné de Formule 1 - Éditer une biographie</h2>
                @else
                    <h2 class="titre-create">Gestionnaire de Biographies Passionné de Formule 1 - Ajouter une nouvelle biographie</h2>
                @endif
            </div>
        </div>

        @if (isset($biographie))

        <!-- Image en arrière plan de la page d'édition -->

        <div class="background-image background-edit">

        @else

        <!-- Image en arrière plan de la page de création -->

        <div class="background-image background-create">

        @endif

            <!-- Affichage du formulaire pour la création ou l'édition des biographies -->

            <div class="create-edit-container">

                <!-- S'il y a une erreur, on affiche un message -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oups ! </strong>Il y a des problèmes avec votre post/biographie.
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($biographie))

                <!-- Formulaire d'édition d'une biographie en pouvant modifier le nom & prénom du pilote, le texte de biographie, sa date de naissance, sa carrière en F1 et ses réseaux sociaux éventuels ainsi qu'optionnelement l'image de biographie, l'image d'arrière-plan et sa date de décès -->

                <form action="{{ route('biographie.update', $biographie) }}" method="post" enctype="multipart/form-data" class="edit-form">
                @method('PUT')

                @else

                <!-- Formulaire de création d'une biographie en renseignant le nom & prénom du pilote, l'image de biographie, l'image d'arrière-plan, le texte de biographie, sa date de naissance, facultativement sa date de décès, sa carrière en F1 et ses réseaux sociaux éventuels -->            

                <form action="{{ route('biographie.store') }}" method="post" enctype="multipart/form-data" class="create-form">

                @endif

                    @csrf

                    <div class="row">
                        <div class="col">
                            <!-- Nom & Prénom du Pilote -->
                            <div class="form-biographie-champ-nom-prenom-pilote">
                                <strong>Nom & Prénom du pilote :</strong>
                                <input type="text" name="nom_prenom_pilote" id="nom_prenom_pilote" value="{{isset($biographie->nom_prenom_pilote) ? $biographie->nom_prenom_pilote : old('nom_prenom_pilote')}}" placeholder="Nom & Prénom du pilote" class="form-control">
                            </div>
                            <!-- Texte de la biographie -->
                            <div class="form-biographie-champ-texte-biographie">
                                <strong>Texte de la biographie :</strong>
                                <textarea name="texte_biographie" id="texte_biographie" placeholder="Texte de la biographie" cols="30" rows="10" class="form-control">{{isset($biographie->texte_biographie) ? $biographie->texte_biographie : old('texte_biographie')}}</textarea>
                            </div>
                            <!-- Date de naissance du pilote -->
                            <div class="form-biographie-champ-date-naissance">
                                <label for="date_naissance"><strong>Date de Naissance :</strong></label>
                                <input type="date" name="date_naissance" id="date_naissance" value="{{isset($biographie->date_naissance) ? $biographie->date_naissance : old('date_naissance')}}" placeholder="Date de naissance du pilote" class="form-control">
                            </div>
                            <!-- Date de déces du pilote (facultatif) -->
                            <div class="form-biographie-champ-date-deces">
                                <label for="date_deces"><strong>Date de Décès :</strong></label>
                                <input type="date" name="date_deces" id="date_deces" value="{{isset($biographie->date_deces) ? $biographie->date_deces : old('date_deces')}}" placeholder="Date de décès du pilote" class="form-control">
                            </div>
                            <!-- Carrière du pilote -->
                            <div class="form-biographie-champ-carriere">
                                <strong>Carrière :</strong>
                                <input type="text" name="carriere" id="carriere" value="{{isset($biographie->carriere) ? $biographie->carriere : old('carriere')}}" placeholder="Carrière du pilote" class="form-control">
                            </div>
                            <!-- Réseaux du pilote -->
                            <div class="form-biographie-champ-reseaux">
                                <strong>Réseaux du pilote :</strong>
                                <input type="text" name="reseaux" id="reseaux" value="{{isset($biographie->reseaux) ? $biographie->reseaux : old('reseaux')}}" placeholder="Réseaux du pilote" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <!-- Image en arrière-plan de la carte de biographie  -->
                            <div class="form-biographie-champ-background-image">
                                <label for="background_image"><strong>Arrière-plan de la carte de biographie :</strong></label>
                                @if (isset($biographie->background_image))
                                    <div class="edit-champ-background-image">
                                    <img src="{{ asset('storage/biographie/' . $biographie->background_image) }}" alt="Arrière-plan utilisé pour la carte de biographie affichée sur la page 'Biographie de Pilotes'" class="background-image-actuelle">
                                        <input type="file" name="background_image" id="background_image" class="form-control input-nvl-background-image">
                                    </div>
                                @else
                                    <input type="file" name="background_image" id="background_image" class="form-control">
                                @endif
                            </div>
                            <!-- Image de la biographie -->
                            <div class="form-biographie-champ-image-biographie">
                                <label for="image_biographie"><strong>Image de la biographie :</strong></label>
                                @if (isset($biographie->image_biographie))
                                    <div class="edit-champ-image-biographie">
                                        <img src="{{ asset('storage/biographie/' . $biographie->image_biographie) }}" alt="Image illustrant la biographie du pilote" class="image-biographie-actuelle">
                                        <input type="file" name="image_biographie" id="image_biographie" class="form-control input-nvl-image-biographie">
                                    </div>
                                @else
                                    <input type="file" name="image_biographie" id="image_biographie" class="form-control">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton d'envoi du formulaire (rempli) de création/édition de biographies -->

            <div class="create-envoy">
                <button type="submit" class="btn-envoy"><img src="{{ url('/images/bouton_icones/envoyBtn.png') }}" alt="Icône du bouton d'envoi">Envoyer</button>
            </div>
        </form> 
    </main>
@endsection