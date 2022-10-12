@extends('layouts.header')

@section('title', 'Recherche')

@section('contenu')
    <main class="recherche">

        <!-- Titre de la page de recherche -->

        <h2 class="titre-recherche">Résultats de la recherche pour : '{{ $query }}'</h2>

        <!-- Affichage des résultats présent dans chaque variable -->

        <!-- Si une variable contient a minima 1 résultat, on affiche 1 titre de section et le ou les résultat(s) contenu(s) dans la variable -->

        @if (count($articles) > 0)

            <!-- Variable Articles -->

            <div class="recherche-articles">
                <h3 class="titre-section">Articles :</h3>
                @foreach ($articles as $article)
                    <p>{{ $article->titre }}</p>
                @endforeach
            </div>
        @endif

        @if (count($biographies) > 0)

            <!-- Variable Biographies -->

            <div class="recherche-biographies">
                <h3 class="titre-section">Biographies :</h3>
                @foreach ($biographies as $biographie)
                    <p>{{ $biographie->nom_prenom_pilote }}</p>
                @endforeach
            </div>
        @endif

        @if (count($pilotes) > 0)

            <!-- Variable Pilotes -->

            <div class="recherche-pilotes">
                <h3 class="titre-section">Pilotes :</h3>
                @foreach ($pilotes as $pilote)
                    <p>{{ $pilote->nom_pilote }}</p>
                @endforeach
            </div>
        @endif

        @if (count($ecuries) > 0)

            <!-- Variable Ecuries -->

            <div class="recherche-ecuries">
                <h3 class="titre-section">Ecuries :</h3>
                @foreach ($ecuries as $ecurie)
                    <p>{{ $ecurie->nom_ecurie }}</p>
                @endforeach
            </div>
        @endif

        @if (count($photos) > 0)

            <!-- Variable Photos -->

            <div class="recherche-photos">
                <h3 class="titre-section">Photos :</h3>
                @foreach ($photos as $photo)
                    <p>{{ $photo->titre_photo }}</p>
                @endforeach
            </div>
        @endif
    </main>

    @include('layouts.footer')
@endsection