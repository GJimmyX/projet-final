@extends('layouts.header')

@section('title', 'Photos')

@section('contenu')
    <main class="photos">

        <!-- Image en arrière plan de la page de photos -->

        <div class="background-image">

            <!-- Contenu de la page 'Photos' -->

            <div class="photos-contenu">
                @foreach ($photos as $photo)
                    <div class="photo-card">
                        <div class="container-card">
                            <img src="{{ asset('storage/photo/' . $photo->image_photo) }}" alt="Photo présentée sur le site" class="image-photo">
                            <a href="{{ url('/photos', $photo->id) }}" class="link-card">{{ $photo->titre_photo }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Pagination pour les photos -->

        <div class="photos-pagination">
            {!! $photos->links('layouts.pagination-custom') !!}
        </div>
    </main>

    @include('layouts.footer')

@endsection