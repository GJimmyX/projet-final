@extends('photo.layout')

@section('title', 'DashBoard Photos')

@section('contenu-photos')
    <main class="accueil-admin-photos">
    <!-- Titre de la page d'accueil et bouton pour l'importation de nouvelles photos -->

    <div class="index-titre-btn">
            <div class="titre-btn-index">
                <!-- Titre -->
                <h2 class="titre-index">Gestionnaire de Photos Passionné de Formule 1 - DashBoard</h2>
                <!-- Bouton -->
                <a href="{{ route('photo.create') }}" class="btn-index">Importer une photo</a>
            </div>
        </div>

        <!-- Si une photo est enregistrée, on affiche un message de réussite -->

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

                <!-- Affichage des infos pour chaque article (Photo, titre de la photo et options pour la photo') -->
                    
                <table class="table table-bordered index-table">

                    <!-- Noms de colonnes du tableau -->

                    <thead class="table-column">
                        <tr class="column-name">
                            <th class="photo-image">Photo</th>
                            <th class="photo-titre">Titre de l'image</th>
                            <th class="photo-options">Options</th>
                        </tr>
                    </thead>

                    <!-- Corps du tableau où sont affichés les photos, il y en a maximum 6 par page -->

                    <tbody class="table-body">
                        @foreach ($photos as $photo)
                            <tr>
                                <!-- Photo -->
                                <td class="photo-image">
                                    <img src="{{ asset('storage/photo/' . $photo->image_photo) }}" alt="Photo importée">
                                </td>
                                <!-- Titre de la photo -->
                                <td class="photo-titre">
                                    <p>{{ $photo->titre_photo }}</p>
                                </td>
                                <!-- Options -->
                                <td class="photo-options">
                                    <div class="btn-photo">
                                        <a href="{{ route('photo.show', $photo ) }}" class="btn-index vision">Voir</a>
                                        <a href="{{ route('photo.edit', $photo ) }}" class="btn-index edition">Éditer</a>
                                        <form method="post" action="{{ route('photo.destroy', $photo ) }}">
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

        <!-- Pagination à partir de 6 photos par page -->

        <div class="index-pagination">
            {!! $photos->links('layouts.pagination-custom') !!}
        </div>
    </main>
@endsection