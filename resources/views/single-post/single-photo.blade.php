@extends('layouts.header')

@section('title', $photo->titre_photo)

@section('contenu')
    <main class="single-photo">

        <!-- Bouton de retour sur la page de photos -->

        <div class="backBtn">
            <!-- Bouton -->
            <a href="{{ route('photos') }}" class="btn-single">< Retour</a>
        </div>

        <!-- Image en arrière plan de la page Single photo -->

        <div class="background-image">

            <!-- Contenu de la page Single -->

            <div class="photo-contenu">
                <img src="{{ asset('storage/photo/' . $photo->image_photo) }}" alt="Photo présentée dans la page Single" class="image-photo">
                <div class="desc">
                    <span>Description de la photo :</span>
                    <p class="desc-photo">{{ $photo->desc_photo }}</p>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
    
@endsection