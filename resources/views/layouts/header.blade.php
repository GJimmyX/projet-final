<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Description du site -->

        <meta name="description" content="Vous êtes sur le site 'Passionné de Formule 1', crée par 1 fan aimant ce sport depuis son plus jeune âge !">

        <!-- Font Awesome -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- Google Fonts -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75,300;0,75,400;0,75,800;1,75,400&display=swap">

        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Icône du site -->

        <link rel="icon" href="{{ url('images/bouton_icones/icon.png') }}">

        <!-- Titre du site -->

        <title>@yield('title') - Passionné de Formule 1</title>

    </head>
    <body>

        <!-- Haut de page du site 'Passionné de Formule 1' -->

        <header>
            <div class="header-container row">

                <!-- Logo du site 'Passionné de Formule 1' -->

                <h1 class="siteLogo">
                    <span class="logo">
                        <a href="{{ route('index') }}" class="logoLink">
                            <img src="{{ url('images/siteLogo.png') }}" alt="Logo du site 'Passionnée de Formule 1'" class="logoImg">
                        </a>
                    </div>
                </h1>

                <!-- Menu de Navigation du site -->

                <nav class="navbar siteNav" id="navbarToggler">

                    <!-- Menu pour l'utilisateur -->

                    <div class="nav-menu">
                        <button id="navbarButton">
                            <img src="{{ url('images/bouton_icones/imgNavbarBtn.png') }}" alt="Image du bouton de menu responsive" class="imgNavbarBtn">
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item text-center">
                                <a class="nav-link" href="{{ route('index') }}">Accueil</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" href="{{ route('classements') }}">Classements</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" href="{{ route('biographies') }}">Biographie de pilotes</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" href="{{ route('photos') }}">Photos</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                            </li>

                            <!-- Bouton de connexion de l'administrateur -->

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item text-center">
                                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-regular"></i></a>
                                    </li>
                                @endif
                            @else

                                <!-- Menu pour l'administrateur du site -->

                                <li class="nav-item text-center dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth()->user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('classement.pilotes.index') }}">{{ __('Gestion des pilotes') }}</a>
                                        <a class="dropdown-item" href="{{ route('article.index') }}">{{ __('Articles du site') }}</a>
                                        <a class="dropdown-item" href="{{ route('biographie.index') }}">{{ __('Biographies du site') }}</a>
                                        <a class="dropdown-item" href="{{ route('photo.index') }}">{{ __('Photos du site') }}</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    
                    <!-- Barre de recherche du site 'Passionné de Formule 1' -->

                    <div class="d-flex flex-column navSearch">
                        <button id="searchBtn" title="Rechercher"><span class="fas mimify-glass"></span></button>
                        <form id="searchBar" action="{{ route('recherche') }}" method="get" enctype="multipart/form-data" class="searchForm">
                            <input type="text" id="searchBar-input" name="searchBar-input" placeholder="Recherche..." aria-label="Rechercher" required class="form-control searchInput">
                        </form>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Contenu du site 'Passionné de Formule 1' -->

        @yield('contenu')