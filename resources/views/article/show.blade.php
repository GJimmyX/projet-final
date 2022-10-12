@extends('article.layout')

@section('title', $article->titre)

@section('contenu-articles')
    <main class="show-admin-articles">
        
        <!-- Titre de la page d'affichage et bouton de retour sur l'accueil administrateur -->

        <div class="row show-titre-btn">
            <div class="titre-btn-show">
                <!-- Bouton -->
                <a href="{{ route('article.index') }}" class="btn-show"><img src="{{ url('/images/bouton_icones/returnBtn.png') }}" alt="Icône du bouton de retour">Retour</a>
                <!-- Titre -->
                <h2 class="titre-show">Gestionnaire de Posts Passionné de Formule 1 - Article enregistré</h2>
            </div>
        </div>

        <!-- Arrière plan de la page de visualisation -->

        <div class="background-show">

            <div class="show-container">

                <!-- Affichage du titre de l'article, du contenu de celui-ci et de l'image de la publication -->

                <div class="row">
                    <!-- Titre de l'article -->
                    <div class="show-titre">
                        <strong>Titre de l'article :</strong>
                        <p class="titre-article">{{ $article->titre }}</p>
                    </div>
                    <!-- Contenu de l'article -->
                    <div class="show-contenu">
                        <strong>Contenu de l'article :</strong>
                        <p class="contenu-article">{{ $article->contenu }}</p>
                    </div>
                    <!-- Image de publication -->
                    <div class="show-image">
                        <strong>Image de l'article :</strong>
                        <img src="{{ asset('storage/article/' . $article->image) }}" alt="Image de la publication" class="img-article">
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection