@extends('classement.pilotes.layout')

<!-- En fonction de la création ou de l'édition de pilotes, modification du titre de la page -->

@if (isset($pilote))
    <!-- Titre de la page d'édition -->
    @section('title', 'Édition du pilote : ' . $pilote->nom_pilote)
@else
    <!-- Titre de la page de création -->
    @section('title', 'Créer un nouveau pilote')
@endif

@section('contenu-pilotes')
    <main class="create-edit-admin-pilotes">

        <!-- Titre de la page et bouton de retour sur l'accueil administrateur -->

        <div class="row create-edit-titre-btn">
            <div class="titre-btn-create-edit">
                <!-- Bouton -->
                <a href="{{ route('classement.pilotes.index') }}" class="btn-create-edit"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                @if (isset($pilote))
                    <h2 class="titre-edit">Gestionnaire de Pilotes Passionné de Formule 1 - Éditer un pilote</h2>
                @else
                    <h2 class="titre-create">Gestionnaire de Pilotes Passionné de Formule 1 - Ajouter un nouveau pilote</h2>
                @endif
            </div>
        </div>

        @if (isset($pilote))

        <!-- Image en arrière plan de la page d'édition -->

        <div class="background-image background-edit">

        @else

        <!-- Image en arrière plan de la page de création -->

        <div class="background-image background-create">

        @endif

            <!-- Affichage du formulaire pour la création ou l'édition des pilotes -->

            <div class="create-edit-container">

                <!-- S'il y a une erreur, on affiche un message -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oups ! </strong>Il y a des problèmes avec votre post/pilote.
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($pilote))

                <!-- Formulaire d'édition d'un pilote en pouvant modifier le nom du pilote, la nationalite de celui-ci et son nombre de points ainsi qu'optionnelement son drapeau et ecurie -->

                <form action="{{ route('classement.pilotes.update', $pilote) }}" method="post" enctype="multipart/form-data" class="edit-form">
                @method('PUT')

                @else

                <!-- Formulaire de création d'un pilote en renseignant le nom du pilote, sa nationalite, son drapeau, son écurie et son nombre de points -->            

                <form action="{{ route('classement.pilotes.store') }}" method="post" enctype="multipart/form-data" class="create-form">

                @endif
                
                    @csrf

                    <div class="row">
                        <!-- Nom de l'écurie du pilote -->
                        <div class="form-pilote-champ-ecurie_id">
                            <strong>Nom de l'écurie du pilote :</strong>
                            <select name="ecurie_id" id="ecurie_id" class="form-control">
                                @if (isset($pilote))
                                    <!-- Lors de l'édition, la catégorie qui a été selectionnée est affichée en premier -->
                                    <?php
                                        $nom_ecurie_auto = '';
                                        $ecurie_id = $pilote->ecurie_id;
                                        $sql = new PDO('mysql:host=localhost;dbname=db_prjfinal;charset=utf8', 'root', '');
                                        $result = $sql->query("SELECT nom_ecurie FROM ecuries INNER JOIN pilotes ON ecuries.id = $ecurie_id");
                                        $nom = $result->fetchColumn();
                                        $nom_ecurie_auto = $nom;
                                    ?>
                                    <option value="{{ isset($pilote->ecurie_id) ? $pilote->ecurie_id : old('ecurie_id') }}" class="current-option">{{ $nom_ecurie_auto }}</option>
                                    @foreach ($ecuries as $ecurie)
                                        @if (isset($pilote) && $ecurie->nom_ecurie != $nom_ecurie_auto)
                                            <option value="{{ $ecurie->id }}">{{ $ecurie->nom_ecurie }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($ecuries as $ecurie)
                                        <option value="{{ $ecurie->id }}">{{ $ecurie->nom_ecurie }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <!-- Role du pilote (Pilote N°1 ou N°2 ?) -->
                        <div class="form-pilote-champ-role_pilote">
                            <strong>Role du pilote dans l'écurie :</strong>
                            <input type="text" name="role_pilote" id="role_pilote" value="{{isset($pilote->role_pilote) ? $pilote->role_pilote : old('role_pilote')}}" placeholder="Nom de l'écurie et numéro de pilote (01 pour premier pilote, 02 pour second ou 03 pour réserve). Ex : alpine01" class="form-control">
                        </div>
                        <!-- Nom du Pilote -->
                        <div class="form-pilote-champ-nom-pilote">
                            <strong>Nom du pilote :</strong>
                            <input type="text" name="nom_pilote" id="nom_pilote" value="{{isset($pilote->nom_pilote) ? $pilote->nom_pilote : old('nom_pilote')}}" placeholder="Nom du pilote" class="form-control">
                        </div>
                        <!-- Nationalité du Pilote -->
                        <div class="form-pilote-champ-nationalite">
                            <strong>Nationalité du pilote :</strong>
                            <input type="text" name="nationalite" id="nationalite" value="{{isset($pilote->nationalite) ? $pilote->nationalite : old('nationalite')}}" placeholder="Nationalité du pilote" class="form-control">
                        </div>
                        <!-- Pays de naissance du pilote -->
                        <div class="form-pilote-champ-drapeau">
                            <label for="drapeau"><strong>Drapeau du pilote :</strong></label>
                            @if (isset($pilote->drapeau))
                                <div class="edit-champ-drapeau">
                                    <img src="{{ asset('storage/pilote/' . $pilote->drapeau) }}" alt="Drapeau correspondant à la nationalité du pilote" class="drapeau-actuel">
                                    <input type="file" name="drapeau" id="drapeau" class="form-control input-nv-drapeau">
                                </div>
                            @else
                                <input type="file" name="drapeau" id="drapeau" class="form-control">
                            @endif
                        </div>
                        <!-- Nombre de points du pilote -->
                        <div class="form-pilote-champ-points">
                            <strong>Nombre de points du pilote :</strong>
                            <input type="number" name="num_points" id="num_points" value="{{isset($pilote->num_points) ? $pilote->num_points : old('num_points')}}" placeholder="Nombre de points du pilote" class="form-control">
                        </div>
                        <!-- Écurie du pilote  -->
                        <div class="form-pilote-champ-img_ecurie">
                            <label for="img_ecurie"><strong>Écusson de l'écurie du pilote :</strong></label>
                            @if (isset($pilote->img_ecurie))
                                <div class="edit-champ-img_ecurie">
                                <img src="{{ asset('storage/pilote/' . $pilote->img_ecurie) }}" alt="Écusson de l'écurie du pilote" class="ecurie-actuelle">
                                    <input type="file" name="img_ecurie" id="img_ecurie" class="form-control input-nvl-ecurie">
                                </div>
                            @else
                                <input type="file" name="img_ecurie" id="img_ecurie" class="form-control">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton d'envoi du formulaire (rempli) de création/édition de pilotes -->

            <div class="create-envoy">
                <button type="submit" class="btn-envoy"><img src="{{ url('/images/bouton_icones/envoyBtn.png') }}" alt="Icône du bouton d'envoi">Envoyer</button>
            </div>
        </form> 
    </main>
@endsection