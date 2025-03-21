@extends('layouts.header')

@section('title', 'Erreur serveur')

@section('contenu')
    <main class="page-503">

        <!-- Image de la page 503 -->

        <div class="img-503">
            <img src="{{ url('images/medias/400.gif') }}" alt="Image animée de la page 503">
        </div>

        <!-- Titre de la page 503 -->

        <h1 class="titre-503">Votre course s'arrête ici, mais vous pouvez la reprendre en retournant en arrière !</h1>
    </main>
    
    @include('layouts.footer')

@endsection