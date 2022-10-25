@extends('layouts.header')

@section('title', 'Page introuvable')

@section('contenu')
    <main class="page-404">

        <!-- Image de la page 404 -->

        <div class="img-404">
            <img src="{{ url('images/medias/404.gif') }}" alt="Image animée de la page 404">
        </div>

        <!-- Titre de la page 404 -->

        <h1 class="titre-404">Votre course s'arrête ici, mais vous pouvez la reprendre en retournant en arrière !</h1>
    </main>
    
    @include('layouts.footer')

@endsection