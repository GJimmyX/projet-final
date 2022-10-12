@extends('classement.pilotes.layout')

@section('title', 'DashBoard Pilotes')

@section('contenu-pilotes')
    <main class="accueil-admin-pilotes">

        <!-- Titre de la page d'accueil et bouton pour la création de nouveaux pilotes -->

        <div class="index-titre-btn">
            <div class="titre-btn-index">
                <!-- Titre -->
                <h2 class="titre-index">Gestionnaire de Pilotes Passionné de Formule 1 - DashBoard</h2>
                <!-- Bouton -->
                <a href="{{ route('classement.pilotes.create') }}" class="btn-index">Créer un nouveau pilote</a>
            </div>
        </div>

        <!-- Si un pilote est enregistré, on affiche un message de réussite -->

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

                <!-- Affichage des infos pour chaque pilote (Nom du Pilote, nationalite et drapeau, nombre de points, ecurie et options pour l'article') -->
                    
                <table class="table table-bordered index-table">

                    <!-- Noms de colonnes du tableau -->

                    <thead class="table-column">
                        <tr class="column-name">
                            <th class="pilote-nom">Nom Pilote</th>
                            <th class="pilote-drapeau pilote-nationalite">Pays et Nationalité</th>
                            <th class="pilote-points">Nombre de points</th>
                            <th class="pilote-img_ecurie">Écurie du pilote</th>
                            <th class="pilote-options">Options</th>
                        </tr>
                    </thead>

                    <!-- Corps du tableau où sont affichés les pilotes, il y en a maximum 10 par page -->

                    <tbody class="table-body">
                        @foreach ($pilotes as $pilote)
                            <tr>
                                <!-- Nom du Pilote -->
                                <td class="pilote-nom">
                                    <p>{{ $pilote->nom_pilote }}</p>
                                </td>
                                <!-- Pays et Nationalité du Pilote -->
                                <td class="pilote-drapeau pilote-nationalite">
                                    <div class="pilote-drapeau-nationalite">
                                        <p>{{ $pilote->nationalite }}</p>
                                        <img src="{{ asset('storage/pilote/' . $pilote->drapeau) }}" alt="Drapeau correspondant à la nationalité du pilote">
                                    </div>
                                </td>
                                <!-- Nombre de points du pilote -->
                                <td class="pilote-points">
                                    <p>{{ $pilote->num_points }}</p>
                                </td>
                                <!-- Écurie du pilote  -->
                                <td class="pilote-img_ecurie">
                                    <img src="{{ asset('storage/pilote/' . $pilote->img_ecurie) }}" alt="Écusson de l'écurie du pilote">
                                </td>
                                <!-- Options -->
                                <td class="pilote-options">
                                    <div class="btn-pilote">
                                        <a href="{{ route('classement.pilotes.show', $pilote ) }}" class="btn-index vision">Voir</a>
                                        <a href="{{ route('classement.pilotes.edit', $pilote ) }}" class="btn-index edition">Éditer</a>
                                        <form method="post" action="{{ route('classement.pilotes.destroy', $pilote ) }}">
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

        <!-- Pagination à partir de 10 pilotes par page -->

        <div class="index-pagination">
            {!! $pilotes->links('layouts.pagination-custom') !!}
        </div>
    </main>
@endsection