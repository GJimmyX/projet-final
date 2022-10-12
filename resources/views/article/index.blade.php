@extends('article.layout')

@section('title', 'DashBoard Articles')

@section('contenu-articles')
    <main class="accueil-admin-articles">

        <!-- Titre de la page d'accueil et bouton pour la création de nouveaux articles -->

        <div class="index-titre-btn">
            <div class="titre-btn-index">
                <!-- Titre -->
                <h2 class="titre-index">Gestionnaire de Posts(Articles) Passionné de Formule 1 - DashBoard</h2>
                <!-- Bouton -->
                <a href="{{ route('article.create') }}" class="btn-index">Créer un nouvel article</a>
            </div>
        </div>

        <!-- Si un article est enregistré, on affiche un message de réussite -->

        <div class="index-message">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>

        <!-- Image en arrière plan de l'accueil administrateur -->

        <div class="background-image">
            <div class="index-container">

                <!-- Affichage des infos pour chaque article (Titre, image, date de publication et options pour l'article') -->
                    
                <table class="table table-bordered index-table">

                    <!-- Noms de colonnes du tableau -->

                    <thead class="table-column">
                        <tr class="column-name">
                            <th class="article-titre">Titre de l'article</th>
                            <th class="article-image">Image de la publication</th>
                            <th class="article-date">Date de publication</th>
                            <th class="article-options">Options</th>
                        </tr>
                    </thead>

                    <!-- Corps du tableau où sont affichés les articles, il y en a maximum 4 par page -->

                    <tbody class="table-body">
                        @foreach ($articles as $article)
                            <tr>
                                <!-- Titre de l'article -->
                                <td class="article-titre">
                                    <p>{{ $article->titre }}</p>
                                </td>
                                <!-- Image -->
                                <td class="article-image">
                                    <img src="{{ asset('storage/article/' . $article->image) }}" alt="Image de la publication">
                                </td>
                                <!-- Date de publication de l'article -->
                                <td class="article-date">
                                    <x-date date="{{ $article->date }}" class="date"></x-date>
                                </td>
                                <!-- Options -->
                                <td class="article-options">
                                    <div class="btn-article">
                                        <a href="{{ route('article.show', $article ) }}" class="btn-index vision">Voir</a>
                                        <a href="{{ route('article.edit', $article ) }}" class="btn-index edition">Éditer</a>
                                        <form method="post" action="{{ route('article.destroy', $article ) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" value="Supprimer" class="btn-index suppression">Supprimer</button>
                                        </form>
                                    </div>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>   
        </div>

        <!-- Pagination à partir de 4 articles par page -->

        <div class="index-pagination">
            {!! $articles->links('layouts.pagination-custom') !!}
        </div>
    </main>
@endsection