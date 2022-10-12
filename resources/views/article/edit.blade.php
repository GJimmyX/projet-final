@extends('article.layout')

<!-- En fonction de la création ou de l'édition d'article, modification du titre de la page -->

@if (isset($article))
    <!-- Titre de la page d'édition -->
    @section('title', 'Édition de l\'article : ' . $article->titre)
@else
    <!-- Titre de la page de création -->
    @section('title', 'Créer un nouvel article')
@endif

@section('contenu-articles')
    <main class="create-edit-admin-articles">

        <!-- Titre de la page et bouton de retour sur l'accueil administrateur -->

        <div class="row create-edit-titre-btn">
            <div class="titre-btn-create-edit">
                <!-- Bouton -->
                <a href="{{ route('article.index') }}" class="btn-create-edit"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                @if (isset($article))
                    <h2 class="titre-edit">Gestionnaire de Posts(Articles) Passionné de Formule 1 - Éditer un article</h2>
                @else
                    <h2 class="titre-create">Gestionnaire de Posts(Articles) Passionné de Formule 1 - Ajouter un nouvel article</h2>
                @endif
            </div>
        </div>

        @if (isset($article))

        <!-- Image en arrière plan de la page d'édition -->

        <div class="background-image background-edit">

        @else

        <!-- Image en arrière plan de la page de création -->

        <div class="background-image background-create">

        @endif

            <!-- Affichage du formulaire pour la création ou l'édition des articles -->

            <div class="create-edit-container">

                <!-- S'il y a une erreur, on affiche un message -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oups ! </strong>Il y a des problèmes avec votre post/article.
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($article))

                <!-- Formulaire d'édition d'un article en pouvant modifier le titre de l'article, la date, le contenu et l'image de celui-ci -->

                <form action="{{ route('article.update', $article) }}" method="post" enctype="multipart/form-data" class="edit-form">
                @method('PUT')

                @else

                <!-- Formulaire de création d'un article en renseignant le titre de l'article, sa date, le contenu et l'image de publication -->            

                <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data" class="create-form">

                @endif
                
                    @csrf

                    <div class="row">
                        <!-- Titre de l'article -->
                        <div class="form-article-champ-titre">
                            <strong>Titre de l'Article :</strong>
                            <input type="text" name="titre" id="titre" value="{{isset($article->titre) ? $article->titre : old('titre')}}" placeholder="Titre" class="form-control">
                        </div>
                        <!-- Date de publication de l'article -->
                        <div class="form-article-champ-date">
                            <label for="date"><strong>Date de publication :</strong></label>
                            <input type="date" name="date" id="date" value="{{isset($article->date) ? $article->date : old('date')}}" class="form-control">
                        </div>
                        <!-- Contenu de l'article -->
                        <div class="form-article-champ-contenu">
                            <strong>Contenu de l'article :</strong>
                            <textarea name="contenu" id="contenu" placeholder="Description" cols="30" rows="10" class="form-control">{{isset($article->contenu) ? $article->contenu : old('contenu')}}</textarea>
                        </div>
                        <!-- Image -->
                        <div class="form-article-champ-image">
                            <label for="image"><strong>Image de l'article :</strong></label>
                            @if (isset($article->image))
                                <div class="edit-champ-image">
                                    <img src="{{ asset('storage/article/' . $article->image) }}" alt="Image de la publication" class="img-actuelle">
                                    <input type="file" name="image" id="image" class="form-control input-nvl-img">
                                </div>
                            @else
                                <input type="file" name="image" id="image" class="form-control">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton d'envoi du formulaire (rempli) de création/édition d'article -->

            <div class="create-envoy">
                <button type="submit" class="btn-envoy"><img src="{{ url('/images/bouton_icones/envoyBtn.png') }}" alt="Icône du bouton d'envoi"><span>Envoyer</span></button>
            </div>
        </form> 
    </main>
@endsection