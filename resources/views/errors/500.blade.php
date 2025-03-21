@extends('layouts.header')

@section('title', 'Erreur serveur')

@section('contenu')
    <main class="page-500">

        <!-- Image de la page 500 -->

        <div class="img-500">
            <img src="{{ url('images/medias/400.gif') }}" alt="Image animée de la page 500">
        </div>

        <!-- Titre de la page 500 -->

        <h1 class="titre-500">Votre course s'arrête ici, mais vous pouvez la reprendre en retournant en arrière !</h1>
    </main>
    
    @include('layouts.footer')

@endsection