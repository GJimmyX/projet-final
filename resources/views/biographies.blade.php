@extends('layouts.header')

@section('title', 'Biographies')

@section('contenu')
    <main class="biographies">

        <!-- Image en arrière plan de la page de biographies -->

        <div class="background-image">

            <!-- Contenu de la page 'Biographie de Pilotes' -->

            <div class="biographies-contenu">
                @foreach ($biographies as $biographie)
                    <div class="biographie-card" style="background-image : url('<?php echo asset('storage/biographie/' . $biographie->background_image); ?>');">
                        <div class="container-card">
                            <div class="image-card" style="background-image : url('<?php echo asset('storage/biographie/' . $biographie->image_biographie); ?>');"></div>
                            <p class="taille desc-card">
                                @if (strlen($biographie->texte_biographie)>80)
                                    {{ $biographie->texte_biographie = substr($biographie->texte_biographie, 0, 80) }}...
                                @else
                                    {{ $biographie->texte_biographie }}
                                @endif
                            </p>
                            <p class="taille"><a href="{{ url('/biographies', $biographie->id) }}" class="link-card"> Cliquez ici pour lire la suite</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination pour les biographies -->

        <div class="biographies-pagination">
            {!! $biographies->links('layouts.pagination-custom') !!}
        </div>
    </main>

    @include('layouts.footer')

@endsection