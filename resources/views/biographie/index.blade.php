@extends('biographie.layout')

@section('title', 'DashBoard Biographies')

@section('contenu-biographies')
    <main class="accueil-admin-biographies">

        <!-- Titre de la page d'accueil et bouton pour la création de nouvelles biographies -->

        <div class="index-titre-btn">
            <div class="titre-btn-index">
                <!-- Titre -->
                <h2 class="titre-index">Gestionnaire de Biographies Passionné de Formule 1 - DashBoard</h2>
                <!-- Bouton -->
                <a href="{{ route('biographie.create') }}" class="btn-index">Créer une nouvelle biographie</a>
            </div>
        </div>

        <!-- Si une biographie est enregistrée, on affiche un message de réussite -->

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

                <!-- Affichage des infos pour chaque biographie (Nom du Pilote, image de la biographie, texte de la biographie et options pour la biographie') -->
                    
                <table class="table table-bordered index-table">

                    <!-- Noms de colonnes du tableau -->

                    <thead class="table-column">
                        <tr class="column-name">
                            <th class="biographie-nom">Nom & Prénom Pilote</th>
                            <th class="biographie-image">Image de la biographie</th>
                            <th class="biographie-texte">Texte de la biographie</th>
                            <th class="biographie-options">Options</th>
                        </tr>
                    </thead>

                    <!-- Corps du tableau où sont affichés les biographies, il y en a maximum 2 par page -->

                    <tbody class="table-body">
                        @foreach ($biographies as $biographie)
                            <tr>
                                <!-- Nom & Prénom du Pilote -->
                                <td class="biographie-nom">
                                    <p>{{ $biographie->nom_prenom_pilote }}</p>
                                </td>
                                <!-- Image de la biographie -->
                                <td class="biographie-image">
                                    <img src="{{ asset('storage/biographie/' . $biographie->image_biographie) }}" alt="Image d'illustration de la biographie">
                                </td>
                                <!-- Texte de la biographie -->
                                <td class="biographie-texte">
                                    @if (strlen($biographie->texte_biographie)>80)
                                        <p>{{ $biographie->texte_biographie = substr($biographie->texte_biographie, 0, 80) }}...</p>
                                    @else
                                        <p>{{ $biographie->texte_biographie }}</p>
                                    @endif
                                </td>
                                <!-- Options -->
                                <td class="biographie-options">
                                    <div class="btn-biographie">
                                        <a href="{{ route('biographie.show', $biographie ) }}" class="btn-index vision">Voir</a>
                                        <a href="{{ route('biographie.edit', $biographie ) }}" class="btn-index edition">Éditer</a>
                                        <form method="post" action="{{ route('biographie.destroy', $biographie ) }}">
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

        <!-- Pagination à partir de 2 biographies par page -->

        <div class="index-pagination">
            {!! $biographies->links('layouts.pagination-custom') !!}
        </div>
    </main>
@endsection