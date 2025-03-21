@extends('layouts.header')

@section('title', 'Accueil')

@section('contenu')
    <main class="accueil">

        <!-- Message lors de la déconnexion de l'admin -->

        <div class="index-message">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>

        <!-- Slider d'images (Au minimum 3 images) -->

        <div id="slider">
            <a href="#" id="prev" onclick="plusSlides(-1)">&#8810;</a>
            <ul id="sliderAccueil" class="slider-accueil">
                <li class="slider-item">
                    <img src="{{ url('images/slider/img_slider01.jpg') }}" alt="Image du slider" class="slider-image">
                </li>
                <li class="slider-item">
                    <img src="{{ url('images/slider/img_slider02.jpg') }}" alt="Image du slider" class="slider-image">
                </li>
                <li class="slider-item">
                    <img src="{{ url('images/slider/img_slider03.jpg') }}" alt="Image du slider" class="slider-image">
                </li>
                <li class="slider-item">
                    <img src="{{ url('images/slider/img_slider04.jpg') }}" alt="Image du slider" class="slider-image">
                </li>
            </ul>
            <a href="#" id="next" onclick="plusSlides(1)">&#8811;</a>
        </div>

        <!-- Image en arrière plan de l'accueil visiteur -->

        <div class="background-image">

            <!-- Contenu de la page d'accueil -->

            <div class="accueil-contenu">

                <!-- Section passion -->

                <div class="section_passion">

                    <!-- Présentation de ma passion -->

                    <div class="presentation">

                        <!-- Titre de la section -->

                        <h2 class="titre-presentation">D'où vient ma passion ?</h2>

                        <!-- Intro de la section -->

                        <p class="contenu-presentation">
                            Ma passion pour la F1 m'est venue lorsque j'étais encore tout jeune, à l'âge de 5 ans. Le premier GP que j'ai visionné (si mes souvenirs me trompent pas !) étant le GP du Japon 2003.
                            Cette passion s'étant orientée autour de la beauté ainsi que de la puissance des voitures de cette époque (Le bruit des V10 ...).
                        </p>

                        <!-- Boutons de la section -->

                        <div class="boutons-son-intro">

                            <!-- Intro championnat 2022 de Formule 1 -->

                            <button id="intro-button" class="intro-2024">
                                Intro Officielle
                            </button>
                            <div id="modal-intro" class="modal">
                                <div class="modal-dialog modal-fullscreen">
                                    <span class="fas modal-button"></span>
                                    <div class="modal-content">
                                        <video id="vid">
                                            <source src="{{ url('images/medias/intro_F1_2024.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>

                            <!-- Sonorité d'un V10 -->

                            <button id="v10-button" class="sonorite-v10">
                                Sonorité du V10
                            </button>
                            <div id="modal-v10" class="modal">
                                <div class="modal-dialog modal-fullscreen">
                                    <span class="fas modal-button"></span>
                                    <div class="modal-content">
                                        <img src="{{ url('images/bouton_icones/headphones-icon.png') }}" alt="Îcone de la modal" class="img-modal">
                                        <audio id="aud">
                                            <source src="{{ url('images/medias/le_moteur_v10.mp3') }}">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Classement subjectif de mes pilotes favoris -->

                    <div class="pilotesFav">

                        <!-- Titre de la section -->

                        <h2 class="titre-pilotesFav">Mes pilotes préférés en Formule 1</h2>

                        <!-- Intro de la section -->

                        <p class="contenu-pilotesFav">
                            Le premier classement sera sur l'ancienne génération de pilotes ayant amenée à la nouvelle génération de pilotes qui sera représentée dans le second classement.
                        </p>
                        <div class="classement-pilotesFav">

                            <!-- Pilotes ancienne Génération -->

                            <div class="pilotesAncienneGen">
                                <h3 class="classement-titre">Classement ancienne génération</h3>
                                <ul class="classement-pilotesAncienneGen">
                                    <li class="pilote-item">Ayrton Senna</li>
                                    <li class="pilote-item">Michael Schumacher</li>
                                    <li class="pilote-item">Alain Prost</li>
                                    <li class="pilote-item">Niki Lauda</li>
                                    <li class="pilote-item">James Hunt</li>
                                </ul>
                            </div>

                            <!-- Pilotes nouvelle génération -->

                            <div class="pilotesNouvelleGen">
                                <h3 class="classement-titre">Classement nouvelle génération</h3>
                                <ul class="classement-pilotesNouvelleGen">
                                    <li class="pilote-item">Lewis Hamilton</li>
                                    <li class="pilote-item">Fernando Alonso</li>
                                    <li class="pilote-item">Sébastian Vettel</li>
                                    <li class="pilote-item">Charles Leclerc</li>
                                    <li class="pilote-item">Nico Rosberg</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Classement subjectif de mes écuries favorites -->

                    <div class="ecuriesFav">

                        <!-- Titre de la section -->

                        <h2 class="titre-ecuriesFav">Mes écuries préférés en Formule 1</h2>

                        <!-- Intro de la section -->

                        <p class="contenu-ecuriesFav">
                            Enfin, pour terminer ma description de passion en Formule 1, je vais établir un classment All Time des meilleures écuries de F1 qui ont été / sont toujours présentes en Formule 1.
                        </p>
                        <div class="classement-ecuriesFav">

                            <!-- Écuries favorites All Time -->

                            <div class="ecuriesFavAllTime">
                                <h3 class="classement-titre">Classement All Time des écuries de F1</h3>
                                <ul class="classement-ecuriesFavAllTime">
                                    <li class="ecurie-item">Ferrari</li>
                                    <li class="ecurie-item">Mercedes</li>
                                    <li class="ecurie-item">Alfa Roméo</li>
                                    <li class="ecurie-item">Matra</li>
                                    <li class="ecurie-item">Renault</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section A propos -->
                
                <div class="section-a-propos">
                    <div class="a-propos">

                        <!-- Image de la section -->

                        <img src="{{ url('images/illustrations/img_a_propos.jpg') }}" alt="Image de la section 'A propos'" class="image-a-propos">

                        <!-- Contenu de la section -->

                        <div class="container-a-propos">

                            <!-- Titre de la section -->

                            <h2 class="titre-a-propos">A propos de moi :</h2>

                            <!-- Intro de la section -->

                            <div class="contenu">

                                <!-- Mini présentation -->

                                <p class="contenu-a-propos">
                                    La personne derrière ce site, c'est moi ! Je me prénomme Jimmy, on peut me surnommer Jim, ou JimX pour les intimes.
                                    Je suis né le 14 Juin 1998, ce qui fait de moi un jeune passionné de Formule 1 !
                                    J'habite dans le nord-ouest de la France, plus précisement dans la région Pays de La Loire.
                                </p>

                                <!-- Explication A propos -->

                                <p class="contenu-a-propos">
                                    Aujourd'hui m'est donc venu le moment de vous présenter cette discipline qui me tient très à coeur, par pur envie tout simplement !
                                    À travers ce site, vous verrez donc plusieurs (et nombreuses !) photos montrant la beauté et l'émouvance de ce sport crée il y a de ça 70 ans.
                                    En faisant le tour du site, vous aussi peut-être, pourrez tomber amoureux de ce sport prestigieux !
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Articles de l'accueil visiteur  -->

        <div class="accueil-articles">
            @foreach ($articles as $article)
                <div class="articles-card">
                    <div class="container-card">
                        <div class="entete-card">
                            <h2 class="titre-card">{{ $article->titre }}</h2>
                            <x-date date="{{ $article->date }}" class="date-card"></x-date>
                        </div>
                        <p class="contenu-card">{{ $article->contenu }}</p>
                        <img src="{{ asset('storage/article/' . $article->image) }}" alt="Image de la carte d'article" class="image-card">
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- JS pour les modals de la page d'accueil -->

    <script>

        /* On récupère le bouton de la modal 'Intro Officielle' */

        let btnvid = document.querySelector('#intro-button');

        /* On récupère le container de la modal */

        let modalvid = document.querySelector('#modal-intro');

        /* On récupère le contenu de la modal */

        let vid = document.querySelector('#vid');

        /* On affiche et ajoute l'évènement de lancement automatique */

        btnvid.addEventListener("click", () => {
            vid.play();
            modalvid.style.display='block';
        });

        /* On cache et ajoute l'évènement de pause automatique */

        modalvid.addEventListener("click", () => {
            vid.pause();
            modalvid.style.display='none';
        });

        /* On récupère le bouton de la modal 'Sonorité du V10' */

        let btnaud = document.querySelector('#v10-button');

        /* On récupère le container de la modal */
        
        let modalaud = document.querySelector('#modal-v10');

        /* On récupère le contenu de la modal */

        let aud = document.querySelector('#aud');

        /* On affiche et ajoute l'évènement de lancement automatique */

        btnaud.addEventListener("click", () => {
            aud.play();
            modalaud.style.display='block';
        });

        /* On cache et ajoute l'évènement de pause automatique */

        modalaud.addEventListener("click", () => {
            aud.pause();
            modalaud.style.display='none';
        });

    </script>

    @include('layouts.footer')

@endsection